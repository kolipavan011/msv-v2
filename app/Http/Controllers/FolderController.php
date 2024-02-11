<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Video;
use Illuminate\Http\Request;
use Inertia\Response;

class FolderController extends Controller
{
    function index(): Response
    {
        $id = request()->query('id', 1);

        return inertia('Media/Index', [
            'folder' => $id,
            'items' => array_merge(
                Folder::query()
                    ->where('folder_id', $id)
                    ->get(['id', 'title', 'created_at'])
                    ->map(function ($item) {
                        $item->thumbnail = "/img/next-folder.jpg";
                        $item->isfolder = true;
                        return $item;
                    })
                    ->toArray(),
                Video::query()
                    ->where('folder_id', $id)
                    ->get(['id', 'title', 'thumbnail', 'path', 'size', 'created_at'])
                    ->map(function ($item) {
                        $item->isfolder = false;
                        return $item;
                    })
                    ->toArray()
            )
        ]);
    }
}
