<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;
use YouTube\YouTubeDownloader;
use YouTube\Exception\YouTubeException;

class VidbotController extends Controller
{
    public function index(Request $request): Response
    {
        return inertia("Vidbot/Index", [
            'pageToken' => $request->query('pageToken', null),
            'keyword' => $request->query('q', ""),
        ]);
    }

    function create(string $id)
    {
        $youtube = new YouTubeDownloader();

        try {
            $downloadOptions = $youtube->getDownloadLinks($id);

            if ($downloadOptions->getAllFormats()) {
                echo $downloadOptions->getFirstCombinedFormat()->url;
            } else {
                echo 'No links found';
            }
        } catch (YouTubeException $e) {
            echo 'Something went wrong: ' . $e->getMessage();
        }

        return response()->json([]);
    }

    private function downloadVideo()
    {
        //CODE  
    }
}
