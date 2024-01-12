<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actress>
 */
class ActressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->name;

        return [
            'name' => $name,
            'slug' => str()->slug($name),
            'image' => $this->faker->imageUrl(),
            'nationality' => rand(0,34),
        ];
    }
}
