<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collections = collect([]);

        for ($i=0; $i < 50; $i++) {
            $title = fake()->unique()->sentence;

            $collections->push([
                'title' => $title,
                'slug' => str()->slug($title),
                'category_id' => fake()->randomElement(['1', '3']),
                'user_id' => 1,
                'year' => rand(2007,2024),
                'description' => fake()->paragraph(3),
                'quality' => rand(1,4), // App\Http\Helpers\DataArray::QUALITIES
                'views' => rand(10,99875640),
                'image' => 'https://source.unsplash.com/random/1400x700/?cinema',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        foreach ($collections->chunk(5)->toArray() as $chunk) {
            \App\Models\Post::insert($chunk);
        }

        for ($i=0; $i < 200; $i++) {
            DB::table('post_actress')->insert([
                'post_id' => rand(1,50),
                'actress_id' => rand(1,10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        for ($i=0; $i < 500; $i++) {
            DB::table('posts_links')->insert([
                'post_id' => rand(1,50),
                'link' => fake()->url,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        \App\Models\Actress::factory(10)->create();

    }
}
