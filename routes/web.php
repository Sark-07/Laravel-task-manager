<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NotFoundController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AssignTaskController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;

// Route::get('/', function () {

//     if (!auth()->check()) {

//         return view('shared.choose-user');
//     }

//     return redirect(auth()->user()->type ? '/admin/dashboard' : '/user/dashboard');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');



Route::middleware('auth')->group(function () {

    // Task Routes
    Route::get('/new/task', [TasksController::class, 'create'])->name('task.create');
    Route::post('/new/task', [TasksController::class, 'store'])->name('task.store');
    Route::get('/view/task/{task}', [TasksController::class, 'view'])->name('task.view');
    Route::get('/edit/task/{task}', [TasksController::class, 'edit'])->name('task.edit');
    Route::patch('/edit/task/{task}', [TasksController::class, 'update'])->name('task.update');
    Route::delete('/delete/task/{task}', [TasksController::class, 'destroy'])->name('task.destroy');

    // Task Assignment Route
    Route::get('/assign/new/task/', [AssignTaskController::class, 'create'])->name('assign.task.create');
    Route::post('/assign/new/task/', [AssignTaskController::class, 'store'])->name('assign.task.store');
    Route::post('/assign/existing/task/{task}', [AssignTaskController::class, 'assign'])->name('assign.task.assign');


    // Comment Route
    Route::post('/add/comment/{task}', [CommentController::class, 'store'])->name('comment.store'); 
       
    // User Dashboard
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard')->middleware('notAadmin');
});



// User Auth Routes
Route::get('/user/register', [UserAuthController::class, 'create'])->name('user.create');
Route::post('/user/register', [UserAuthController::class, 'store'])->name('user.store');
Route::get('/user/login', [UserAuthController::class, 'view'])->name('user.view');
Route::post('/user/login', [UserAuthController::class, 'login'])->name('user.login');
Route::post('/user/logout', [UserAuthController::class, 'logout'])->name('user.logout')->middleware('auth', 'notAadmin');




Route::middleware('auth', 'admin')->group(function () { 
    // Category Route
    Route::get('/manage/category', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/add/category', [CategoryController::class, 'store'])->name('category.store');
    Route::patch('/update/category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/delete/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

});

// Admin Auth Routes
Route::get('/admin/register', [AdminAuthController::class, 'create'])->name('admin.create');
Route::post('/admin/register', [AdminAuthController::class, 'store'])->name('admin.store');
Route::get('/admin/login', [AdminAuthController::class, 'view'])->name('admin.view');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout')->middleware('auth', 'admin');



// 404 Route
Route::get('/{any}', [NotFoundController::class, 'notFound'])->where('any', '.*');
