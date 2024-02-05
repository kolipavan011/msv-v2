<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return inertia("Tag/Index", [
            'tags' => Tag::query()->select('id', 'label', 'created_at')
                ->latest()
                ->paginate()
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

        return redirect()->back()->with('success', 'Tag Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Tag::query()->findOrFail($id)->delete();

        return redirect()->back();
    }
}
