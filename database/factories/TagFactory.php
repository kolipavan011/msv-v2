<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'label' => fake()->sentence(3),
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'description' => fake()->text(220),
            'body' => fake()->text(500),
            'user_id' => 1
        ];
    }

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (\App\Models\Tag $tag) {
            $tag->seo->update([
                'title' => $tag->title,
                'description' => $tag->description
            ]);
        });
    }
}
