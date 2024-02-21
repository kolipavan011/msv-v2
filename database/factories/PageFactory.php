<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
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
            'body' => fake()->text(600),
            'user_id' => 1
        ];
    }

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (\App\Models\Page $page) {
            $page->seo->update([
                'title' => $page->title,
                'description' => fake()->paragraph()
            ]);
        });
    }
}
