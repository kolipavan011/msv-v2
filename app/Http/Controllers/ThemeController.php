<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\View\View;

class ThemeController extends Controller
{
    function index(): View
    {
        $posts = Post::query()
            // ->whereNot('published_at', null)
            ->latest('published_at')
            ->paginate();

        $pages = Page::all();
        $categories = Category::all();
        $tags = Tag::all();

        return view('home', compact(['posts', 'pages', 'tags', 'categories']));
    }

    function category(string $slug): View
    {
        $archive = Category::query()
            ->where('slug', $slug)
            ->first();

        $posts = $archive->posts()->paginate();

        $pages = Page::all();
        $categories = Category::all();
        $tags = Tag::all();

        return view('archive', compact(['archive', 'posts', 'pages', 'tags', 'categories']));
    }

    function tag(string $slug): View
    {
        $archive = Tag::query()
            ->where('slug', $slug)
            ->first();

        $posts = $archive->posts()->paginate();

        $pages = Page::all();
        $categories = Category::all();
        $tags = Tag::all();

        return view('archive', compact(['archive', 'posts', 'pages', 'tags', 'categories']));
    }

    function page(string $slug): View
    {
        $article = Page::query()
            ->where('slug', $slug)
            ->first();

        $pages = Page::all();
        $categories = Category::all();
        $tags = Tag::all();

        return view('page', compact(['article', 'pages', 'tags', 'categories']));
    }
}
