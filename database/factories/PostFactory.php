<?php

namespace Database\Factories;

use App\Models\Category;
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
        $title = $this->faker->unique()->sentence;

        return [
            'title' => $title,
            'slug' => str()->slug($title),
            'category_id' => rand(1,5),
            'user_id' => 1,
            'year' => now(),
            'description' => $this->faker->paragraph(2),
            'quality' => $this->faker->randomElement(['720', '1080']),
        ];
    }
}
