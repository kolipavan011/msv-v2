<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\VidbotController;
use App\Http\Controllers\VideoController;
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

// Auth
Route::get('dashmin/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login')
    ->middleware('guest');
Route::post('dashmin/login', [AuthenticatedSessionController::class, 'store']);

// Dashmin
Route::prefix('/dashmin')->middleware('auth')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // Posts
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

    //categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    //tags
    Route::get('/tags', [TagController::class, 'index'])->name('tags');
    Route::get('/tags/{id}', [TagController::class, 'show'])->name('tags.show');
    Route::put('/tags/{id}', [TagController::class, 'update'])->name('tags.update');
    Route::delete('/tags/{id}', [TagController::class, 'destroy'])->name('tags.destroy');

    //pages
    Route::get('/pages', [PageController::class, 'index'])->name('pages');
    Route::get('/pages/{id}', [PageController::class, 'show'])->name('pages.show');
    Route::put('/pages/{id}', [PageController::class, 'update'])->name('pages.update');
    Route::delete('/pages/{id}', [PageController::class, 'destroy'])->name('pages.destroy');

    //vidbot
    Route::get('/vidbot', [VidbotController::class, "index"])->name('vidbot');
    Route::post('/vidbot/{id}', [VidbotController::class, "create"])->name('vidbot.create');

    //folder
    Route::get('/media', [FolderController::class, "index"])->name('media');

    //video
    Route::post('/video/{id}', [VideoController::class, "create"])->name('video.create');

    //setting
    Route::get('/setting', [DashboardController::class, 'index'])->name('setting');
});
