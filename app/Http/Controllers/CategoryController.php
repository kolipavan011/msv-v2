<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Inertia\Response;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return inertia("Category/Index", [
            'filter' => request('filter', 'untrashed'),
            'posts' => Category::query()
                ->select('id', 'created_at', 'label', 'deleted_at')
                ->when(request('filter', 'untrashed') != 'untrashed', function (Builder $query): Builder {
                    return $query->onlyTrashed();
                }, function (Builder $query): Builder {
                    return $query;
                })
                ->latest()
                ->paginate()
                ->withQueryString(),
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

        Category::create([
            'label' => request('title', 'new category'),
            'title' => request('title', 'new category'),
            'slug' => Str::slug(request('title', 'new category')),
            'user_id' => auth()->user()->id
        ]);

        Cache::flush('sidebar');

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return inertia("Category/Edit", [
            'category' => Category::query()
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
    public function update(CategoryRequest $request, string $id)
    {
        $data = $request->validated();
        $seo = $request->input('seo', []);

        $category = Category::find($id);

        if (!$category) {
            abort(404);
        }

        $category->update($data);
        $category->seo->update($seo);

        Cache::flush('sidebar');

        return redirect()->back()->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::query()
            ->withTrashed()->findOrFail($id);

        if ($category->deleted_at == null) {
            $category->delete();
        } else {
            $category->forceDelete();
        }

        Cache::flush('sidebar');

        return redirect()->back();
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(string $id)
    {
        $category = Category::query()
            ->withTrashed()->findOrFail($id);

        if ($category->deleted_at != null) {
            $category->restore();
        }

        Cache::flush('sidebar');
        return redirect()->back();
    }
}
