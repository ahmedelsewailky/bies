<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mainCategories = ['افلام', 'برامج', 'مسلسلات', 'بودكاست',];

        foreach ($mainCategories as $category) {
            \App\Models\Category::create([
                'name' => $category,
            ]);
        }
    }
}
