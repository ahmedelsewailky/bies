<?php

namespace Database\Seeders;

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
                'icon' => $category . '.png'
            ]);
        }

        \App\Models\Category::create([
            'name' => 'افلام مصرية',
            'parent_id' => 1
        ]);
        \App\Models\Category::create([
            'name' => 'افلام خليجية',
            'parent_id' => 1
        ]);
        \App\Models\Category::create([
            'name' => 'افلام آسيوية',
            'parent_id' => 1
        ]);
        \App\Models\Category::create([
            'name' => 'افلام هندية',
            'parent_id' => 1
        ]);
        \App\Models\Category::create([
            'name' => 'افلام اجنبية',
            'parent_id' => 1
        ]);



        \App\Models\Category::create([
            'name' => 'برامج سطح مكتب',
            'parent_id' => 2
        ]);
        \App\Models\Category::create([
            'name' => 'برامج انتي فيروس',
            'parent_id' => 2
        ]);
        \App\Models\Category::create([
            'name' => 'انظمة تشغيل',
            'parent_id' => 2
        ]);
        \App\Models\Category::create([
            'name' => 'برامج كتابة',
            'parent_id' => 2
        ]);
        \App\Models\Category::create([
            'name' => 'برامج تصاميم',
            'parent_id' => 2
        ]);



        \App\Models\Category::create([
            'name' => 'مسلسلات مصرية',
            'parent_id' => 3
        ]);
        \App\Models\Category::create([
            'name' => 'مسلسلات خليجية',
            'parent_id' => 3
        ]);
        \App\Models\Category::create([
            'name' => 'مسلسلات كورية',
            'parent_id' => 3
        ]);
        \App\Models\Category::create([
            'name' => 'مسلسلات هندية',
            'parent_id' => 3
        ]);
        \App\Models\Category::create([
            'name' => 'مسلسلات اجنبية',
            'parent_id' => 3
        ]);
        \App\Models\Category::create([
            'name' => 'مسلسلات تركية',
            'parent_id' => 3
        ]);
    }
}
