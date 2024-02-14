<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Inertia\Response;

class DashboardController extends Controller
{
    /**
     * Show inertia dashboard component response
     *
     * @return Response
     */
    public function index(): Response
    {
        return inertia('Dashboard', [
            'posts' => Post::count(),
            'categories' => Category::count(),
            'tags' => Tag::count(),
            'pages' => Page::count()
        ]);
    }
}
