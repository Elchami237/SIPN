<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => ['fr' => 'Projets', 'en' => 'Projects'],
                'slug' => 'projets',
            ],
            [
                'name' => ['fr' => 'Événements', 'en' => 'Events'],
                'slug' => 'evenements',
            ],
            [
                'name' => ['fr' => 'Communiqués', 'en' => 'Press Releases'],
                'slug' => 'communiques',
            ],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
