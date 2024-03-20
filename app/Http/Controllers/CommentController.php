<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Tasks;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Tasks $task, Request $request) {
        
        $validateData = $request->validate(['body' => 'required|max:300']);
        $validateData['user_id'] = auth()->user()->id;
        $validateData['task_id'] = $task->id;
        Comment::create($validateData);
        return redirect()->back()->with('added', 'Comment added');
    }
}
