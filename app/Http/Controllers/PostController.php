<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the post.
     */
    public function index(): Response
    {
        return inertia('Post/Index', [
            'posts' => Post::query()
                ->select('id', 'title', 'slug', 'feature_image', 'description', 'created_at')
                ->paginate()
        ]);
    }

    /**
     * Show the form for creating a new post.
     */
    public function create(): RedirectResponse
    {
        return redirect()->route('posts');
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified post.
     */
    public function show(string $id): Response
    {
        return inertia('Post/Edit', [
            'post' => Post::query()->with('seo')->findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified post in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        Post::query()->find($id)
            ->update($request->validate());

        return redirect()->back();
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Post::query()
            ->findOrFail($id)
            ->delate();

        return redirect()->back();
    }
}
