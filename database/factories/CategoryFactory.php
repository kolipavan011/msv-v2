<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
            'description' => fake()->paragraph(),
            'body' => fake()->text(300),
            'user_id' => 1
        ];
    }

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (\App\Models\Category $category) {
            $category->seo->update([
                'title' => $category->title,
                'description' => $category->description
            ]);
        });
    }
}
