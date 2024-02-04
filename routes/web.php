<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/dashmin')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Auth
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login')
        ->middleware('guest');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // Posts
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

    //categories
    Route::get('/categories', [DashboardController::class, 'index'])->name('categories');
    Route::get('/categories/{id}', [DashboardController::class, 'show'])->name('categories.show');
    Route::put('/categories/{id}', [DashboardController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [DashboardController::class, 'destroy'])->name('categories.destroy');

    //tags
    Route::get('/tags', [DashboardController::class, 'index'])->name('tags');
    Route::get('/tags/{id}', [DashboardController::class, 'show'])->name('tags.show');
    Route::put('/tags/{id}', [DashboardController::class, 'update'])->name('tags.update');
    Route::delete('/tags/{id}', [DashboardController::class, 'destroy'])->name('tags.destroy');

    //pages
    Route::get('/pages', [DashboardController::class, 'index'])->name('pages');
    Route::get('/pages/{id}', [DashboardController::class, 'index'])->name('pages.show');
    Route::put('/pages/{id}', [DashboardController::class, 'index'])->name('pages.update');
    Route::delete('/pages/{id}', [DashboardController::class, 'index'])->name('pages.destroy');

    //vidbot
    Route::get('/vidbot', [DashboardController::class, 'index'])->name('vidbot');
    Route::get('/setting', [DashboardController::class, 'index'])->name('setting');
});
