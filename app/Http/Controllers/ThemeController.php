<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use RalphJSmit\Laravel\SEO\SchemaCollection;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class ThemeController extends Controller
{
    public const PER_PAGE = 30;

    function index(): View
    {
        $posts = Post::query()
            ->whereNot('published_at', null)
            ->latest('published_at')
            ->paginate(Self::PER_PAGE);

        $sidebar = $this->sidebar();

        $SEOData = new SEOData(title: 'Mirchi Status Video Download, Best Whatsapp Status Videos', description: 'Best Whatsapp Status Video download, Full Screen Status Video, Download Status Videos from god status video, sad status video and more here');

        return view('home', compact(['posts', 'sidebar', 'SEOData']));
    }

    function post(string $slug): View
    {
        $post = Post::query()
            ->where('slug', $slug)
            ->with('seo', 'categories')
            ->first();

        if (!$post) {
            abort(404);
        }

        $videos = $post->videos()->paginate(Self::PER_PAGE);

        $sidebar = $this->sidebar();

        $SEOData = new SEOData(
            title: $post->seo->title,
            description: $post->seo->description,
            image: $post->feature_image,
            type: 'article',
            section: count($post->categories) > 0 ? $post->categories[0] : null,
            published_time: $post->published_at,
            modified_time: $post->updated_at,
            schema: SchemaCollection::initialize()->addArticle()
        );

        return view('post', compact(['post', 'videos', 'sidebar', 'SEOData']));
    }

    function category(string $slug): View
    {
        $archive = Category::query()
            ->where('slug', $slug)
            ->with('seo')
            ->first();

        if (!$archive) {
            abort(404);
        }

        $posts = $archive->posts()->paginate(Self::PER_PAGE);

        $sidebar = $this->sidebar();

        $SEOData = new SEOData(
            title: $archive->seo->title,
            description: $archive->seo->description
        );

        return view('archive', compact(['archive', 'posts', 'sidebar', 'SEOData']));
    }

    function tag(string $slug): View
    {
        $archive = Tag::query()
            ->where('slug', $slug)
            ->with('seo')
            ->first();

        if (!$archive) {
            abort(404);
        }

        $posts = $archive->posts()->paginate(Self::PER_PAGE);

        $sidebar = $this->sidebar();

        $SEOData = new SEOData(
            title: $archive->seo->title,
            description: $archive->seo->description
        );

        return view('archive', compact(['archive', 'posts', 'sidebar', 'SEOData']));
    }

    function page(string $slug): View
    {
        $article = Page::query()
            ->where('slug', $slug)
            ->with('seo')
            ->first();

        if (!$article) {
            abort(404);
        }

        $sidebar = $this->sidebar();

        $SEOData = new SEOData(
            title: $article->seo->title,
            description: $article->seo->description
        );

        return view('page', compact(['article', 'sidebar', 'SEOData']));
    }

    function sidebar(): array
    {
        return Cache::rememberForever('sidebar', function () {
            $categories = Category::oldest()
                ->get(['label', 'slug']);

            return [
                'pages' => Page::get(['label', 'slug']),
                'categories' => $categories,
                'tags' => Tag::get(['label', 'slug']),
                'navigation' => $categories->take(3)
            ];
        });
    }
}
