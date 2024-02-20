<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public $sitemaps = ['posts.xml', 'category.xml', 'tags.xml', 'pages.xml'];

    // sitemap index
    function index(): Response
    {
        $sitemaps = collect($this->sitemaps)->map(function ($item) {
            return route('sitemap.single', $item);
        });

        return response()->view('sitemap_index', compact('sitemaps'))
            ->header('Content-Type', 'text/xml');
    }

    //sitemap archive
    function single(string $slug): Response
    {
        if (!in_array($slug, $this->sitemaps)) {
            return abort(404);
        }

        switch (array_search($slug, $this->sitemaps)) {
            case 1:
                $route = 'category';
                $list = \App\Models\Category::latest();
                break;

            case 2:
                $route = 'tag';
                $list = \App\Models\Tag::latest();
                break;

            case 3:
                $route = 'page';
                $list = \App\Models\Page::latest();
                break;

            default:
                $route = 'post';
                $list = \App\Models\Post::whereNot('published_at', null)
                    ->latest();
                break;
        }

        $urls = $list->get(['slug', 'updated_at'])->map(function ($item) use ($route) {
            return [
                'url' => route($route, $item->slug),
                'time' => $item->updated_at->tz('UTC')->toAtomString()
            ];
        });

        return response()->view('sitemap_single', compact('urls'))
            ->header('Content-Type', 'text/xml');
    }
}
