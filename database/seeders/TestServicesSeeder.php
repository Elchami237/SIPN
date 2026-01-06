<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class TestServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Supprimer les services existants pour éviter les doublons
        Service::truncate();

        // Créer plusieurs services de test
        $services = [
            [
                'name' => json_encode([
                    'fr' => 'Location de Matériels Roulants',
                    'en' => 'Rolling Equipment Rental'
                ]),
                'slug' => 'location-materiels-roulants',
                'description' => json_encode([
                    'fr' => 'Location complète de matériels roulants pour vos chantiers : tracteurs Mercedes, camions, remorques et véhicules utilitaires.',
                    'en' => 'Complete rental of rolling equipment for your construction sites: Mercedes tractors, trucks, trailers and utility vehicles.'
                ]),
                'category' => 'location',
                'icon' => 'truck',
                'features' => json_encode([
                    'fr' => [
                        'Tracteurs Mercedes dernière génération',
                        'Camions de différentes capacités',
                        'Remorques spécialisées',
                        'Maintenance incluse',
                        'Livraison sur site'
                    ]
                ]),
                'is_active' => true,
                'order' => 1
            ],
            [
                'name' => json_encode([
                    'fr' => 'Location de Matériels de Chantier',
                    'en' => 'Construction Equipment Rental'
                ]),
                'slug' => 'location-materiels-chantier',
                'description' => json_encode([
                    'fr' => 'Location de compresseurs d\'air et groupes électrogènes pour tous vos besoins en chantier.',
                    'en' => 'Rental of air compressors and generators for all your construction site needs.'
                ]),
                'category' => 'location',
                'icon' => 'forklift',
                'features' => json_encode([
                    'fr' => [
                        'Compresseurs haute performance',
                        'Groupes électrogènes silencieux',
                        'Maintenance préventive',
                        'Support technique 24/7'
                    ]
                ]),
                'is_active' => true,
                'order' => 2
            ],
            [
                'name' => json_encode([
                    'fr' => 'Construction Métallique',
                    'en' => 'Metal Construction'
                ]),
                'slug' => 'construction-metallique',
                'description' => json_encode([
                    'fr' => 'Conception, fabrication et installation de structures métalliques pour tous types de bâtiments industriels et commerciaux.',
                    'en' => 'Design, fabrication and installation of metal structures for all types of industrial and commercial buildings.'
                ]),
                'category' => 'construction',
                'icon' => 'building',
                'features' => json_encode([
                    'fr' => [
                        'Études techniques complètes',
                        'Fabrication sur mesure',
                        'Installation professionnelle',
                        'Garantie décennale'
                    ]
                ]),
                'is_active' => true,
                'order' => 3
            ],
            [
                'name' => json_encode([
                    'fr' => 'Génie Civil et Travaux Publics',
                    'en' => 'Civil Engineering and Public Works'
                ]),
                'slug' => 'genie-civil-travaux-publics',
                'description' => json_encode([
                    'fr' => 'Réalisation de travaux de génie civil et travaux publics de toutes envergures : terrassement, voirie, assainissement.',
                    'en' => 'Realization of civil engineering and public works of all scales: earthworks, roads, sanitation.'
                ]),
                'category' => 'genie-civil',
                'icon' => 'construction',
                'features' => json_encode([
                    'fr' => [
                        'Terrassement et nivellement',
                        'Construction de voiries',
                        'Réseaux d\'assainissement',
                        'Ouvrages d\'art'
                    ]
                ]),
                'is_active' => true,
                'order' => 4
            ],
            [
                'name' => json_encode([
                    'fr' => 'Traitement de Surface',
                    'en' => 'Surface Treatment'
                ]),
                'slug' => 'traitement-de-surface',
                'description' => json_encode([
                    'fr' => 'Services complets de traitement et protection des surfaces métalliques : sablage, grenaillage, peinture industrielle.',
                    'en' => 'Complete treatment and protection services for metal surfaces: sandblasting, shot blasting, industrial painting.'
                ]),
                'category' => 'spray',
                'icon' => 'spray',
                'features' => json_encode([
                    'fr' => [
                        'Sablage haute pression',
                        'Grenaillage professionnel',
                        'Peinture anticorrosion',
                        'Contrôle qualité rigoureux'
                    ]
                ]),
                'is_active' => true,
                'order' => 5
            ],
            [
                'name' => json_encode([
                    'fr' => 'Vente de Grit',
                    'en' => 'Grit Sales'
                ]),
                'slug' => 'vente-de-grit',
                'description' => json_encode([
                    'fr' => 'Fourniture et vente de grit de haute qualité pour tous vos besoins de sablage et de traitement de surface. Notre grit est disponible en différentes granulométries.',
                    'en' => 'Supply and sale of high-quality grit for all your sandblasting and surface treatment needs. Our grit is available in different grain sizes.'
                ]),
                'category' => 'spray',
                'icon' => 'box',
                'features' => json_encode([
                    'fr' => [
                        'Grit de différentes granulométries',
                        'Qualité industrielle certifiée',
                        'Livraison rapide sur site',
                        'Conseils techniques personnalisés',
                        'Prix compétitifs pour grandes quantités'
                    ]
                ]),
                'is_active' => true,
                'order' => 6
            ]
        ];

        foreach ($services as $serviceData) {
            Service::create($serviceData);
        }

        echo "Services créés avec succès !\n";
    }
}