<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videos = Video::get(['id', 'thumbnail']);

        Post::factory(100)
            ->sequence(fn (Sequence $sequence) => ['feature_image' => $videos->random()->thumbnail])
            ->hasAttached($videos)
            ->create();
    }
}
