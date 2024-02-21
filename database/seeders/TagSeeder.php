<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Tag::factory(5)
            ->hasAttached(Post::inRandomOrder()
                ->take(30)
                ->get(['id']))
            ->create();
    }
}
