<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Tasks;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public static function index()
    {

        // dd(request()->all());
        $tasks = Tasks::filter()
            ->with('user', 'categories');
        if (request('due_date') === 'oldest') {
            $tasks = $tasks->oldest('due_date')->paginate(10);
        } else {

            $tasks = $tasks->latest('due_date')->paginate(10);
        }
        return view('shared.home', ['tasks' => $tasks, 'categories' => Categories::all()]);
    }
}
