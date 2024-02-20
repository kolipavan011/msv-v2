<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\View\View;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class ThemeController extends Controller
{
    public const PER_PAGE = 20;

    function index(): View
    {
        $posts = Post::query()
            ->whereNot('published_at', null)
            ->latest('published_at')
            ->paginate(Self::PER_PAGE);

        $pages = Page::all();
        $categories = Category::all();
        $tags = Tag::all();

        $SEOData = new SEOData(title: 'Mirchi Status Video Download', description: 'Best video status video download for whatsapp, facebook and instagram');

        return view('home', compact(['posts', 'pages', 'tags', 'categories', 'SEOData']));
    }

    function post(string $slug): View
    {
        $post = Post::query()
            ->where('slug', $slug)
            ->with('seo')
            ->first();

        $videos = $post->videos()->paginate(Self::PER_PAGE);

        // dd($videos);

        $pages = Page::all();
        $categories = Category::all();
        $tags = Tag::all();

        $SEOData = new SEOData(
            title: $post->seo->title,
            description: $post->seo->description,
        );

        return view('post', compact(['post', 'videos', 'pages', 'tags', 'categories', 'SEOData']));
    }

    function category(string $slug): View
    {
        $archive = Category::query()
            ->where('slug', $slug)
            ->with('seo')
            ->first();

        $posts = $archive->posts()->paginate(Self::PER_PAGE);

        $pages = Page::all();
        $categories = Category::all();
        $tags = Tag::all();

        $SEOData = new SEOData(
            title: $archive->seo->title,
            description: $archive->seo->description
        );

        return view('archive', compact(['archive', 'posts', 'pages', 'tags', 'categories', 'SEOData']));
    }

    function tag(string $slug): View
    {
        $archive = Tag::query()
            ->where('slug', $slug)
            ->with('seo')
            ->first();

        $posts = $archive->posts()->paginate(Self::PER_PAGE);

        $pages = Page::all();
        $categories = Category::all();
        $tags = Tag::all();

        $SEOData = new SEOData(
            title: $archive->seo->title,
            description: $archive->seo->description
        );

        return view('archive', compact(['archive', 'posts', 'pages', 'tags', 'categories', 'SEOData']));
    }

    function page(string $slug): View
    {
        $article = Page::query()
            ->where('slug', $slug)
            ->with('seo')
            ->first();

        $pages = Page::all();
        $categories = Category::all();
        $tags = Tag::all();

        $SEOData = new SEOData(
            title: $article->seo->title,
            description: $article->seo->description
        );

        return view('page', compact(['article', 'pages', 'tags', 'categories', 'SEOData']));
    }
}
