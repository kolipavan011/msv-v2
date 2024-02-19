<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\View\View;

class ThemeController extends Controller
{
    public const PER_PAGE = 20;

    function index(): View
    {
        $posts = Post::query()
            // ->whereNot('published_at', null)
            ->latest('published_at')
            ->paginate(Self::PER_PAGE);

        $pages = Page::all();
        $categories = Category::all();
        $tags = Tag::all();

        return view('home', compact(['posts', 'pages', 'tags', 'categories']));
    }

    function post(string $slug): View
    {
        $post = Post::query()
            ->where('slug', $slug)
            ->first();

        $videos = $post->videos()->paginate(Self::PER_PAGE);

        // dd($videos);

        $pages = Page::all();
        $categories = Category::all();
        $tags = Tag::all();

        return view('post', compact(['post', 'videos', 'pages', 'tags', 'categories']));
    }

    function category(string $slug): View
    {
        $archive = Category::query()
            ->where('slug', $slug)
            ->first();

        $posts = $archive->posts()->paginate(Self::PER_PAGE);

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

        $posts = $archive->posts()->paginate(Self::PER_PAGE);

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
