<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/blog', function () {
    return view('list');
});

// Resourceful routes for posts
Route::resource('posts', PostController::class)->only(['index', 'store', 'edit', 'destroy', 'show','list']);
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/blogs', [PostController::class, 'list'])->name('posts.list');
// Resourceful routes for tasks
Route::resource('tasks', TasksController::class)->only(['index', 'create', 'update', 'destroy']);
Route::get('/tasks/{task}', [TasksController::class, 'show'])->name('tasks.show');
Route::post('/tasks/create', [TasksController::class, 'create'])->name('tasks.create');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('posts', PostController::class)->except(['index']);
});

require __DIR__.'/auth.php';
