<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tasks;
use App\Models\Categories;

class AdminDashboardController extends Controller
{
    public static function index()
    {

        $tasks = Tasks::filter()
            ->with('user', 'categories');

        if (request('due_date') === 'oldest') {
            $tasks = $tasks->oldest('due_date')->paginate(10);
        } else {

            $tasks = $tasks->latest('due_date')->paginate(10);
        }
        $users = User::select('id', 'name')
            ->where('id', '!=', auth()->user()->id)
            ->where('type', '!=', 1)
            ->distinct()
            ->get();
        return view('admin.dashboard.dashboard', ['tasks' => $tasks, 'categories' => Categories::all(), 'users' => $users]);
    }
}
