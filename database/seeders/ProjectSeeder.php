<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Project::create([
                'title' => [
                    'fr' => "Projet de construction $i",
                    'en' => "Construction Project $i"
                ],
                'description' => [
                    'fr' => "Description détaillée du projet $i. Travaux de génie civil et construction métallique.",
                    'en' => "Detailed description of project $i. Civil engineering and steel construction works."
                ],
                'client' => "Client $i",
                'location' => "Douala, Cameroun",
                'completed_at' => now()->subMonths(rand(1, 12)),
                'images' => [
                    'https://via.placeholder.com/800x600.png?text=Project+' . $i . '-1',
                    'https://via.placeholder.com/800x600.png?text=Project+' . $i . '-2',
                ],
                'is_featured' => rand(0, 1),
            ]);
        }
    }
}
