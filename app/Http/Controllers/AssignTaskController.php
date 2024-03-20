<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tasks;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskAssigned;
use Illuminate\Console\View\Components\Task;

class AssignTaskController extends Controller
{
    public static function create()
    {
        $users = User::select('id', 'name')
            ->where('id', '!=', auth()->user()->id)
            ->where('type', '!=', 1)
            ->distinct()
            ->get();

        return view('shared.assign-new-task', ['users' => $users, 'categories' => Categories::all()]);
    }

    public static function store(Request $request)
    {
        $validatedData = $request->validate([
            'user' => 'required|array',
            'user.*' => 'exists:users,id',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,category_name',
            'title' => 'required',
            'due_date' => ['required', 'date', 'after_or_equal:today'],
            'status' => 'required',
            'thumbnail' => ['required', 'image'],
            'file' => ['nullable', 'file', 'mimes:jpeg,png,gif,pdf,doc,docx', 'max:2048'], 
            'description' => ['required', 'max:300'],
        ]);

        if (empty($validatedData['categories'])) {
            return redirect()->back()->withErrors(['categories' => 'At least one category must be selected.'])->withInput();
        }

        if (empty($validatedData['user'])) {
            return redirect()->back()->withErrors(['user' => 'At least one user must be selected.'])->withInput();
        }

        $task = Tasks::create([
            'title' => $validatedData['title'],
            'due_date' => $validatedData['due_date'],
            'status' => strtolower($validatedData['status']),
            'thumbnail' => $request->file('thumbnail')->store('thumbnails', 'public'),
            'file' => $request->file('file')->store('files', 'public'),
            'description' => $validatedData['description'],
        ]);


        foreach ($validatedData['categories'] as $categoryName) {
            $category = Categories::where('category_name', $categoryName)->first();
            $task->categories()->attach($category->id);
        }

        $flag = false;
        foreach ($validatedData['user'] as $userId) {
            if ($task->user->contains($userId)) {
                continue;
            }

            $user = User::find($userId);
            if ($user->tasks->contains($task->id)) {
                continue;
            }

            $task->user()->attach($userId);

            Mail::to($user->email)->send(new TaskAssigned($validatedData['title'], $user->name));
            $flag = true;
        }

        return redirect()->back()->with('assigned', $flag ? 'Task assigned' : 'Some of the users already have the task.');
    }



    public static function assign(Tasks $task, Request $request)
    {

        $validatedData =  $request->validate([
            'user' => 'required|array',
            'user.*' => 'exists:users,id'
        ]);

        $flag = false;
        foreach ($validatedData['user'] as $userId) {
            if ($task->user->contains($userId)) {
                continue;
            }

            $user = User::find($userId);
            if ($user->tasks->contains($task->id)) {
                continue;
            }

            $task->user()->attach($userId);

            Mail::to($user->email)->send(new TaskAssigned($task->title, $user->name));
            $flag = true;
        }

        return redirect()->back()->with('assigned', $flag ? 'Task assigned' : 'Some of the users already have the task.');
    }
}
