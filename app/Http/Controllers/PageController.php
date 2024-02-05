<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return inertia("Page/Index", [
            'pages' => Page::query()->select('id', 'label', 'created_at')
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

        return redirect()->back()->with('success', 'Tag Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Page::findOrFail($id)->delete();

        return redirect()->back();
    }
}
