<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = \App\Models\User::factory()->create([
            'name' => 'Pavan Koli',
            'email' => 'kolipavan011@gmail.com',
        ]);

        \App\Models\Post::factory(30)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Tag::factory(10)->create();
        \App\Models\Page::factory(5)->create();
    }
}
