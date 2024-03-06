<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return inertia("Tag/Index", [
            'filter' => request('filter', 'untrashed'),
            'tags' => Tag::query()->select('id', 'label', 'created_at', 'deleted_at')
                ->when(request('filter', 'untrashed') != 'untrashed', function (Builder $query): Builder {
                    return $query->onlyTrashed();
                }, function (Builder $query): Builder {
                    return $query;
                })
                ->latest()
                ->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): RedirectResponse
    {
        request()->validate([
            'title' => 'required',
        ]);

        Tag::create([
            'label' => request('title', 'new tag'),
            'title' => request('title', 'new tag'),
            'slug' => Str::slug(request('title', 'new tag')),
            'user_id' => auth()->user()->id
        ]);

        Cache::flush('sidebar');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return inertia("Tag/Edit", [
            'tag' => Tag::query()
                ->with('seo')->findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, string $id)
    {
        $data = $request->validated();
        $seo = $request->input('seo', []);

        $tag = Tag::find($id);

        if (!$tag) {
            abort(404);
        }

        $tag->update($data);
        $tag->seo->update($seo);

        Cache::flush('sidebar');

        return redirect()->back()->with('success', 'Tag Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $tag = Tag::query()
            ->withTrashed()->findOrFail($id);

        if ($tag->deleted_at == null) {
            $tag->delete();
        } else {
            $tag->forceDelete();
        }

        Cache::flush('sidebar');
        return redirect()->back();
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(string $id): RedirectResponse
    {
        $tag = Tag::query()
            ->withTrashed()->findOrFail($id);

        if ($tag->deleted_at != null) {
            $tag->restore();
        }

        Cache::flush('sidebar');

        return redirect()->back();
    }
}
