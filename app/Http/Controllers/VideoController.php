<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use YouTube\YouTubeDownloader;
use YouTube\Exception\YouTubeException;

class VideoController extends Controller
{
    function create(string $id): JsonResponse
    {
        request()->validate([
            'title' => 'required',
            'keyword' => 'required',
        ]);

        $youtube = new YouTubeDownloader();
        $massage = "fail";

        try {
            $downloadOptions = $youtube->getDownloadLinks($id);

            if ($downloadOptions->getAllFormats()) {
                $video = $downloadOptions->getFirstCombinedFormat()->url;
                $img = $youtube->getThumbnails($id)['high'];

                $massage = $this->download($img, $video) ? "success" : "fail";
            }
        } catch (YouTubeException $e) {
            $massage = $e->getMessage();
        }

        return response()->json(['massage' => $massage]);
    }

    private function download(string $img, string $video): bool
    {
        $now = Carbon::now();
        $storagePath = "public/{$now->year}/{$now->month}/" . Str::slug(request()->input('keyword')) . "-" . time();
        $imgPath = $storagePath . '.jpg';
        $videoPath = $storagePath . '.mp4';

        $imageSize = Storage::put($imgPath, file_get_contents($img));
        $videoSize = Storage::put($videoPath, file_get_contents($video));

        if (!$imageSize && !$videoSize) {
            return false;
        }

        Video::create([
            'title' => request()->input('title'),
            'path' => Storage::url($videoPath),
            'thumbnail' => Storage::url($imgPath),
            'size' => $this->formatFilesize(Storage::size($videoPath)),
            'folder_id' => 1,
            'user_id' => auth()->user()->id,
        ])->save();

        return true;
    }

    /**
     * Convert to filesize units
     *
     * @param integer $size
     * @return void
     */
    private function formatFilesize(int $size)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $power = $size > 0 ? floor(log($size, 1024)) : 0;
        return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
    }
}
