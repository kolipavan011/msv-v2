<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ThemeController;
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

Route::get('/', [ThemeController::class, "index"])->middleware('lscache:max-age=7200');

// Auth
Route::get('dashmin/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
Route::post('dashmin/login', [AuthenticatedSessionController::class, 'store']);

// Dashmin
Route::prefix('/dashmin')->middleware('auth')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // Posts
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::post('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/{id}/image', [PostController::class, 'storeImage'])->name('posts.store');
    Route::delete('/posts/{id}/image', [PostController::class, 'removeImage'])->name('posts.remove');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
    Route::post('/posts/{id}/sync-video', [PostController::class, 'sync'])->name('posts.sync');
    Route::get('/posts/{id}/selector/{folderId}', [FolderController::class, 'select'])->name('posts.select');

    //categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');

    //tags
    Route::get('/tags', [TagController::class, 'index'])->name('tags');
    Route::post('/tags/create', [TagController::class, 'create'])->name('tags.create');
    Route::get('/tags/{id}', [TagController::class, 'show'])->name('tags.show');
    Route::put('/tags/{id}', [TagController::class, 'update'])->name('tags.update');
    Route::delete('/tags/{id}', [TagController::class, 'destroy'])->name('tags.destroy');
    Route::get('/tags/{id}/restore', [TagController::class, 'restore'])->name('tags.restore');

    //pages
    Route::get('/pages', [PageController::class, 'index'])->name('pages');
    Route::post('/pages/create', [PageController::class, 'create'])->name('pages.create');
    Route::get('/pages/{id}', [PageController::class, 'show'])->name('pages.show');
    Route::put('/pages/{id}', [PageController::class, 'update'])->name('pages.update');
    Route::delete('/pages/{id}', [PageController::class, 'destroy'])->name('pages.destroy');
    Route::get('/pages/{id}/restore', [PageController::class, 'restore'])->name('pages.restore');

    //vidbot
    Route::get('/vidbot', [VidbotController::class, "index"])->name('vidbot');
    Route::post('/vidbot/{id}', [VidbotController::class, "create"])->name('vidbot.create');

    //folder
    Route::get('/media', [FolderController::class, "index"])->name('media');
    Route::post('/folder/create', [FolderController::class, "create"])->name('folder.create');
    Route::put('/folder/{id}', [FolderController::class, "update"])->name('folder.update');
    Route::delete('/folder/{id}', [FolderController::class, "destroy"])->name('folder.destroy');

    //video
    Route::post('/video/{id}', [VideoController::class, "create"])->name('video.create');
    Route::post('/video/{id}/move', [VideoController::class, "move"])->name('video.move');
    Route::put('/video/{id}', [VideoController::class, "update"])->name('video.update');
    Route::delete('/video/{id}', [VideoController::class, "destroy"])->name('video.destroy');

    //setting
    Route::get('/setting', [DashboardController::class, 'index'])->name('setting');
});

// sitemap routes
Route::get('/sitemap_index.xml', [SitemapController::class, "index"])
    ->middleware('lscache:max-age=7200')
    ->name('sitemap');
Route::get('/sitemap/{slug}', [SitemapController::class, "single"])
    ->middleware('lscache:max-age=7200')
    ->name('sitemap.single');

// themes routes
Route::get('/{slug}', [ThemeController::class, "post"])
    ->middleware('lscache:max-age=7200')
    ->name('post');
Route::get('/category/{slug}', [ThemeController::class, "category"])
    ->middleware('lscache:max-age=7200')
    ->name('category');
Route::get('/tag/{slug}', [ThemeController::class, "tag"])
    ->middleware('lscache:max-age=7200')
    ->name('tag');
Route::get('/page/{slug}', [ThemeController::class, "page"])
    ->middleware('lscache:max-age=7200')
    ->name('page');
