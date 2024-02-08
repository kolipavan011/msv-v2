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
            'items' => array_merge(
                Folder::query()
                    ->where('folder_id', $id)
                    ->get()
                    ->map(function ($item) {
                        $item->thumbnail = "/img/next-folder.jpg";
                        return $item;
                    })
                    ->toArray(),
                Video::query()
                    ->where('folder_id', $id)
                    ->get()
                    ->toArray()
            )
        ]);
    }
}
