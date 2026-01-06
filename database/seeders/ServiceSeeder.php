<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ajouter le service "Vente de grit"
        Service::create([
            'name' => json_encode([
                'fr' => 'Vente de Grit',
                'en' => 'Grit Sales'
            ]),
            'slug' => 'vente-de-grit',
            'description' => json_encode([
                'fr' => 'Fourniture et vente de grit de haute qualité pour tous vos besoins de sablage et de traitement de surface. Notre grit est disponible en différentes granulométries pour s\'adapter à tous types de projets industriels et de construction.',
                'en' => 'Supply and sale of high-quality grit for all your sandblasting and surface treatment needs. Our grit is available in different grain sizes to suit all types of industrial and construction projects.'
            ]),
            'category' => 'spray',
            'icon' => 'box',
            'features' => json_encode([
                'fr' => [
                    'Grit de différentes granulométries disponibles',
                    'Qualité industrielle certifiée',
                    'Livraison rapide sur site',
                    'Conseils techniques personnalisés',
                    'Prix compétitifs pour grandes quantités',
                    'Stockage sécurisé et conditions optimales',
                    'Analyse granulométrique sur demande',
                    'Support technique inclus'
                ],
                'en' => [
                    'Grit of different grain sizes available',
                    'Certified industrial quality',
                    'Fast on-site delivery',
                    'Personalized technical advice',
                    'Competitive prices for large quantities',
                    'Secure storage and optimal conditions',
                    'Grain size analysis on request',
                    'Technical support included'
                ]
            ]),
            'is_active' => true,
            'order' => 100
        ]);
    }
}