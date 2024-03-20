<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TasksController extends Controller
{

    // create task form
    public static function create()
    {
        return view('shared.new-task', ['categories' => Categories::all()]);
    }

    // store new task
    public static function store(Request $request)
    {
        $validatedData = $request->validate([
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,category_name',
            'title' => ['required'],
            'due_date' => ['required', 'date', 'after_or_equal:today'],
            'status' => ['required'],
            'thumbnail' => ['required', 'image'],
            'file' => ['nullable', 'file', 'mimes:jpeg,png,gif,pdf,doc,docx', 'max:2048'], 
            'description' => ['required', 'max:300'],
        ]);

        if (empty($validatedData['categories'])) {
            return redirect()->back()->withErrors(['categories' => 'At least one category must be selected.'])->withInput();
        }

        $task = Tasks::create([
            'title' => $validatedData['title'],
            'due_date' => $validatedData['due_date'],
            'status' => strtolower($validatedData['status']),
            'thumbnail' => $request->file('thumbnail')->store('thumbnails', 'public'),
            'file' => $request->file('file')->store('files', 'public'),
            'description' => $validatedData['description'],
        ]);
        $task->user()->attach(auth()->user()->id);
        foreach ($validatedData['categories'] as $categoryName) {
            $category = Categories::where('category_name', $categoryName)->first();
            $task->categories()->attach($category->id);
        }

        return redirect()->back()->with('created', 'Task added.');
    }


    // view task
    public static function view(Tasks $task)
    {

        return view('shared.view-task', ['task' => $task->load('comments', 'user', 'categories')]);
    }

    // edit task form
    public static function edit(Tasks $task)
    {

        return view('shared.edit-task', ['task' => $task, 'categories' => Categories::all()]);
    }

    // update task
    public static function update(Tasks $task, Request $request)
    {
        $validatedData = $request->validate([
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,category_name',
            'title' => ['required'],
            'due_date' => ['required', 'date', 'after_or_equal:today'],
            'status' => ['required'],
            'thumbnail' => ['image'],
            'file' => ['nullable', 'file', 'mimes:jpeg,png,gif,pdf,doc,docx', 'max:2048'], 
            'description' => ['required', 'max:300'],
        ]);

        $task->title = $validatedData['title'];
        $task->due_date = $validatedData['due_date'];
        $task->status = strtolower($validatedData['status']);
        $task->description = $validatedData['description'];

        if ($request->hasFile('thumbnail')) {
            $task->thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        if ($request->hasFile('file')) {
            $task->file = $request->file('file')->store('files', 'public');
        }

        $task->save();

        $task->categories()->sync([]);

        foreach ($validatedData['categories'] as $categoryName) {
            $category = Categories::where('category_name', $categoryName)->first();
            $task->categories()->attach($category->id);
        }

        return redirect()->back()->with('updated', 'Task updated.');
    }


    // delete task
    public static function destroy(Tasks $task)
    {

        $task->delete();
        return redirect()->back();
    }
}
