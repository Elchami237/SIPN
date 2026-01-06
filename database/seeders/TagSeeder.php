<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            [
                'name' => ['fr' => 'BTP', 'en' => 'Construction'],
                'slug' => 'btp',
            ],
            [
                'name' => ['fr' => 'Génie Civil', 'en' => 'Civil Engineering'],
                'slug' => 'genie-civil',
            ],
            [
                'name' => ['fr' => 'Location', 'en' => 'Rental'],
                'slug' => 'location',
            ],
            [
                'name' => ['fr' => 'Travaux Publics', 'en' => 'Public Works'],
                'slug' => 'travaux-publics',
            ],
            [
                'name' => ['fr' => 'Infrastructure', 'en' => 'Infrastructure'],
                'slug' => 'infrastructure',
            ],
            [
                'name' => ['fr' => 'Innovation', 'en' => 'Innovation'],
                'slug' => 'innovation',
            ],
        ];

        foreach ($tags as $tag) {
            Tag::firstOrCreate(
                ['slug' => $tag['slug']],
                $tag
            );
        }
    }
}
