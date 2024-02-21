<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'feature_image' => fake()->imageUrl(),
            'description' => fake()->text(220),
            'body' => fake()->text(300),
            'published_at' => today(),
            'user_id' => 1
        ];
    }

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (\App\Models\Post $post) {
            $post->seo->update([
                'title' => $post->title,
                'description' => $post->description
            ]);
        });
    }
}
