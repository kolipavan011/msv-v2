<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use LaravelFreelancerNL\LaravelIndexNow\Facades\IndexNow;
use App\Models\Post;

class IndexNowApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Instant Index published posts';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $posts = Post::query()
            ->select('slug')
            ->where('published_at', '>', now()->subMinute(30))
            ->get()
            ->map(function ($item): string {
                return route('post', ['slug', $item->slug]);
            });

        if (count($posts) > 0 && config('app.env') == 'production') {
            IndexNow::submit($posts);
        }
    }
}
