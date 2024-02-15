<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the post.
     */
    public function index(): Response
    {
        return inertia('Post/Index', [
            'filter' => request('filter', 'published'),
            'posts' => Post::query()
                ->select('id', 'title', 'slug', 'feature_image', 'description', 'created_at', 'deleted_at')
                ->when(request()->query('filter', 'published') != 'trashed', function (Builder $query): Builder {
                    if (request('filter', 'published') == 'published') {
                        return $query->whereNot('published_at', null);
                    } else {
                        return $query->where('published_at', null);
                    }
                }, function (Builder $query): Builder {
                    return $query->onlyTrashed();
                })
                ->latest()
                ->paginate()
                ->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new post.
     */
    public function create(): RedirectResponse
    {
        request()->validate([
            'title' => 'required',
        ]);

        Post::create([
            'title' => request('title', 'new post'),
            'slug' => Str::slug(request('title', 'new post')),
            'user_id' => auth()->user()->id
        ]);
        return redirect()->back();
    }

    /**
     * Store a newly created post in storage.
     */
    public function storeImage(string $id)
    {
        $payload = request()->file();
        $now = Carbon::now();

        if (!$payload) {
            return redirect()->back();
        }

        // Only grab the first element because single file uploads
        // are not supported at this time
        $file = reset($payload);
        $path = $file->storeAs('public/images/' . $now->year, str_replace(" ", "-", $file->getClientOriginalName()));

        Post::query()->withTrashed()->find($id)->update(['feature_image' => $path]);

        return to_route('posts');
    }

    /**
     * Store a newly created post in storage.
     */
    public function removeImage(string $id): RedirectResponse
    {
        $post = Post::query()->withTrashed()->find($id);

        if (Storage::delete($post->feature_image)) {
            $post->update(['feature_image' => null]);
        }

        return to_route('posts');
    }

    /**
     * Display the specified post.
     */
    public function show(string $id): Response
    {
        return inertia('Post/Edit', [
            'post' => Post::query()->with(['seo', 'categories:id,label', 'tags:id,label'])->findOrFail($id),
            'categories' => Category::query()->get(['id', 'label']),
            'tags' => Tag::query()->get(['id', 'label']),
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
    public function update(PostRequest $request, string $id): RedirectResponse
    {
        $data = $request->safe()->except('seo');
        $seo = $request->input('seo', []);

        $post = Post::find($id);

        if (!$post) {
            abort(404);
        }

        $post->seo->update($seo);

        $post->update($data);

        $categories = collect($request->input('categories', []))->map(function ($category) {
            return (string) $category['id'];
        });

        $tags = collect($request->input('tags', []))->map(function ($tag) {
            return (string) $tag['id'];
        });

        $post->categories()->sync($categories);
        $post->tags()->sync($tags);

        return redirect()->back()->with('success', 'Post Updated');
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Post::findOrFail($id)->delete();

        return redirect()->back();
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(string $id): RedirectResponse
    {
        $post = Post::query()
            ->withTrashed()->findOrFail($id);

        if ($post->deleted_at != null) {
            $post->restore();
        }


        return redirect()->back();
    }
}
