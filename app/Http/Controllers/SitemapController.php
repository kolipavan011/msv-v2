<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public $sitemaps = ['posts.xml', 'category.xml', 'tags.xml', 'pages.xml'];

    // sitemap index
    function index(): Response
    {
        // create sitemap
        $sitemap = resolve("sitemap");

        // set cache
        $sitemap->setCache('laravel.sitemap-index', 3600);

        // add sitemaps (loc, lastmod (optional))
        foreach ($this->sitemaps as $_sitemap) {
            $sitemap->addSitemap(route('sitemap.single', $_sitemap), today()->toAtomString());
        }

        // show sitemap
        return $sitemap->render('sitemapindex');
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

        // create sitemap
        $sitemap = resolve("sitemap");

        // set cache
        $sitemap->setCache('laravel.' . $route, 3600);

        $list->get(['slug', 'updated_at'])->each(function ($item) use ($sitemap, $route) {
            $sitemap->add(route($route, $item->slug), $item->updated_at->toAtomString(), 0.8, 'monthly');
        });

        // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
        return $sitemap->render('xml');
    }
}
