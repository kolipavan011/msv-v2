<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Litespeed\LSCache\LSCache;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return inertia("Page/Index", [
            'filter' => request('filter', 'untrashed'),
            'pages' => Page::query()->select('id', 'label', 'created_at', 'deleted_at')
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

        Page::create([
            'label' => request('title', 'new page'),
            'title' => request('title', 'new page'),
            'slug' => Str::slug(request('title', 'new page')),
            'user_id' => auth()->user()->id
        ]);
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return inertia("Page/Edit", [
            'page' => Page::query()
                ->with('seo')
                ->findOrFail($id)
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
    public function update(PageRequest $request, string $id)
    {
        $data = $request->validated();
        $seo = $request->input('seo', []);

        $page = Page::find($id);

        if (!$page) {
            abort(404);
        }

        $page->update($data);
        $page->seo->update($seo);

        LSCache::purge('/', route('page', ['slug', $page->slug]));

        return redirect()->back()->with('success', 'Tag Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $page = Page::query()
            ->withTrashed()->findOrFail($id);

        if ($page->deleted_at == null) {
            $page->delete();
        } else {
            $page->forceDelete();
        }


        return redirect()->back();
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(string $id): RedirectResponse
    {
        $page = Page::query()
            ->withTrashed()->findOrFail($id);

        if ($page->deleted_at != null) {
            $page->restore();
        }


        return redirect()->back();
    }
}
