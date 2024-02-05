<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Inertia\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return inertia("Category/Index", [
            'posts' => Category::query()
                ->select('id', 'created_at', 'label')
                ->latest()
                ->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

        return redirect()->back()->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->back();
    }
}
