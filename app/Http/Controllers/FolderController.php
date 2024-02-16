<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class FolderController extends Controller
{
    function index(): Response
    {
        $folder = Folder::find(request()->query('id', 1));

        return inertia('Media/Index', [
            'folder' => $folder->id ?? 1,
            'name' => $folder->title ?? 'Home',
            'items' => array_merge(
                Folder::query()
                    ->where('folder_id', $folder->id ?? 1)
                    ->get(['id', 'title', 'created_at'])
                    ->map(function ($item) {
                        $item->thumbnail = "/img/next-folder.jpg";
                        $item->isfolder = true;
                        return $item;
                    })
                    ->toArray(),
                Video::query()
                    ->where('folder_id', $folder->id ?? 1)
                    ->get(['id', 'title', 'thumbnail', 'path', 'size', 'created_at'])
                    ->map(function ($item) {
                        $item->isfolder = false;
                        return $item;
                    })
                    ->toArray()
            )
        ]);
    }

    function select(string $id, string $folderId = "1"): Response
    {
        $folder = Folder::find(request()->query('id', $folderId));

        return inertia('Media/Selector', [
            'post' => (int) $id,
            'selection' => Post::find($id)->videos->map(function ($item) {
                return $item->id;
            }),
            'folder' => $folder->id ?? 1,
            'name' => $folder->title ?? 'Home',
            'items' => array_merge(
                Folder::query()
                    ->where('folder_id', $folder->id ?? 1)
                    ->get(['id', 'title', 'created_at'])
                    ->map(function ($item) {
                        $item->thumbnail = "/img/next-folder.jpg";
                        $item->isfolder = true;
                        return $item;
                    })
                    ->toArray(),
                Video::query()
                    ->where('folder_id', $folder->id ?? 1)
                    ->get(['id', 'title', 'thumbnail', 'path', 'size', 'created_at'])
                    ->map(function ($item) {
                        $item->isfolder = false;
                        return $item;
                    })
                    ->toArray()
            )
        ]);
    }

    function create(): RedirectResponse
    {
        Folder::create(request()->validate([
            'title' => 'required',
            'folder_id' => 'required'
        ]));
        return redirect()->back();
    }

    function update(string $id): RedirectResponse
    {
        Folder::query()
            ->find($id)
            ->update(request()->validate(['title' => 'required']));

        return redirect()->back();
    }

    function destroy(string $id): RedirectResponse
    {
        Folder::query()
            ->find($id)
            ->delete();

        Video::query()
            ->where('folder_id', $id)
            ->update(['folder_id' => 1]);

        return to_route('media');
    }
}
