<?php

namespace Database\Seeders;

use App\Models\Actualite;
use App\Models\ActualiteImage;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ActualiteSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $categories = Category::all();
        
        $actualites = [
            [
                'titre' => 'Nouveau projet de construction métallique à Douala',
                'resume' => 'SIPN Services & Rentals a été sélectionné pour réaliser la structure métallique d\'un nouveau complexe industriel de 5000m² dans la zone industrielle de Douala.',
                'contenu' => "Nous sommes fiers d'annoncer que SIPN Services & Rentals a été retenu pour la réalisation de la structure métallique d'un nouveau complexe industriel de 5000m² situé dans la zone industrielle de Douala.\n\nCe projet d'envergure comprend :\n- La conception et fabrication de la charpente métallique\n- L'assemblage et le montage sur site\n- La fourniture de tous les équipements de levage nécessaires\n- Un délai de réalisation de 6 mois\n\nNotre équipe d'ingénieurs et de techniciens spécialisés mettra tout en œuvre pour livrer ce projet dans les délais impartis, en respectant les plus hauts standards de qualité et de sécurité.\n\nCe nouveau contrat témoigne de la confiance que nous accordent nos clients et renforce notre position de leader dans le secteur de la construction métallique au Cameroun.",
                'statut' => 'publie',
                'date_publication' => now()->subDays(2),
                'meta_description' => ['fr' => 'SIPN réalise un nouveau projet de construction métallique de 5000m² à Douala. Découvrez les détails de ce projet d\'envergure.'],
                'meta_keywords' => ['fr' => 'construction métallique, Douala, charpente, industrie, SIPN'],
            ],
            [
                'titre' => 'Acquisition de nouveaux équipements de chantier',
                'resume' => 'Pour mieux servir nos clients, nous avons récemment fait l\'acquisition de nouveaux équipements de pointe : grues mobiles, compresseurs haute performance et générateurs dernière génération.',
                'contenu' => "Dans le cadre de notre politique d'amélioration continue de nos services, SIPN Services & Rentals a procédé à l'acquisition de nouveaux équipements de chantier de dernière génération.\n\nNouvelles acquisitions :\n\n🏗️ Grues mobiles :\n- 2 grues mobiles de 50 tonnes\n- 1 grue mobile de 80 tonnes\n- Technologie de pointe avec systèmes de sécurité avancés\n\n⚡ Compresseurs :\n- 5 compresseurs haute performance 15 bars\n- Faible consommation énergétique\n- Maintenance réduite\n\n🔌 Générateurs :\n- 3 générateurs diesel 200 KVA\n- 2 générateurs diesel 500 KVA\n- Conformes aux normes environnementales\n\nCes investissements nous permettent de :\n- Répondre à une demande croissante\n- Améliorer la qualité de nos prestations\n- Réduire les délais d'intervention\n- Offrir des solutions plus économiques à nos clients\n\nTous ces équipements sont disponibles dès maintenant pour la location.",
                'statut' => 'publie',
                'date_publication' => now()->subDays(5),
                'meta_description' => ['fr' => 'SIPN investit dans de nouveaux équipements : grues mobiles, compresseurs et générateurs pour améliorer ses services de location.'],
                'meta_keywords' => ['fr' => 'équipements chantier, grues mobiles, compresseurs, générateurs, location'],
            ],
            [
                'titre' => 'Formation sécurité : Certification de notre équipe',
                'resume' => 'Toute notre équipe technique vient d\'obtenir sa certification en sécurité industrielle. Un gage de qualité et de professionnalisme pour tous nos projets.',
                'contenu' => "La sécurité étant notre priorité absolue, nous sommes heureux d'annoncer que l'ensemble de notre équipe technique a suivi avec succès une formation complète en sécurité industrielle.\n\nProgramme de formation :\n\n📚 Modules théoriques :\n- Réglementation sécurité au travail\n- Analyse des risques\n- Procédures d'urgence\n- Port des équipements de protection individuelle\n\n🛠️ Modules pratiques :\n- Manipulation sécurisée des équipements\n- Techniques de levage\n- Soudure en sécurité\n- Premiers secours\n\n🏆 Certifications obtenues :\n- 15 techniciens certifiés\n- 8 opérateurs d'équipements lourds\n- 5 soudeurs qualifiés\n- 3 responsables sécurité\n\nCette démarche s'inscrit dans notre engagement qualité et notre volonté de :\n- Garantir la sécurité de nos équipes\n- Protéger nos clients et leurs biens\n- Respecter les normes internationales\n- Maintenir notre certification ISO 9001\n\nNos clients peuvent ainsi avoir l'assurance que tous nos projets sont réalisés selon les plus hauts standards de sécurité.",
                'statut' => 'publie',
                'date_publication' => now()->subWeek(),
                'meta_description' => ['fr' => 'L\'équipe SIPN obtient sa certification sécurité industrielle. Formation complète pour garantir la sécurité sur tous nos chantiers.'],
                'meta_keywords' => ['fr' => 'formation sécurité, certification, équipe technique, sécurité industrielle'],
            ],
            [
                'titre' => 'Partenariat avec TotalEnergies Cameroun',
                'resume' => 'SIPN Services & Rentals signe un contrat de partenariat avec TotalEnergies pour la fourniture d\'équipements et services sur leurs sites industriels.',
                'contenu' => "Nous avons l'honneur d'annoncer la signature d'un contrat de partenariat stratégique avec TotalEnergies Cameroun, l'un des leaders de l'industrie énergétique au Cameroun.\n\nDétails du partenariat :\n\n🤝 Durée : 3 ans renouvelables\n🏭 Périmètre : Tous les sites TotalEnergies au Cameroun\n🛠️ Services : Location d'équipements et maintenance industrielle\n\nServices fournis :\n- Location de grues et équipements de levage\n- Fourniture de compresseurs et générateurs\n- Maintenance préventive et curative\n- Support technique 24h/7j\n- Formation du personnel\n\nCe partenariat représente :\n- Une reconnaissance de notre expertise\n- Un gage de confiance d'un acteur majeur\n- Une opportunité de croissance significative\n- Le renforcement de notre position sur le marché\n\nObjectifs communs :\n✅ Améliorer l'efficacité opérationnelle\n✅ Réduire les coûts de maintenance\n✅ Garantir la sécurité des installations\n✅ Respecter les normes environnementales\n\nCe partenariat s'inscrit dans notre stratégie de développement et confirme notre capacité à accompagner les grands groupes industriels dans leurs projets au Cameroun.",
                'statut' => 'brouillon',
                'date_publication' => null,
                'meta_description' => ['fr' => 'SIPN signe un partenariat stratégique avec TotalEnergies Cameroun pour la fourniture d\'équipements industriels.'],
                'meta_keywords' => ['fr' => 'partenariat, TotalEnergies, équipements industriels, maintenance'],
            ],
            [
                'titre' => 'Expansion : Ouverture d\'une nouvelle agence à Yaoundé',
                'resume' => 'Pour mieux servir nos clients de la région du Centre, SIPN Services & Rentals ouvre une nouvelle agence à Yaoundé avec un parc d\'équipements dédié.',
                'contenu' => "Dans le cadre de notre stratégie d'expansion nationale, nous sommes ravis d'annoncer l'ouverture prochaine de notre nouvelle agence à Yaoundé.\n\nCaractéristiques de la nouvelle agence :\n\n📍 Localisation :\n- Zone industrielle de Yaoundé\n- Accès facile depuis les grands axes\n- Proximité des principaux chantiers\n\n🏢 Infrastructures :\n- Bureau de 200m²\n- Atelier de maintenance 500m²\n- Parc de stockage 2000m²\n- Aire de stationnement équipements\n\n🛠️ Équipements disponibles :\n- 5 grues mobiles (20 à 100 tonnes)\n- 10 compresseurs (5 à 20 bars)\n- 8 générateurs (50 à 300 KVA)\n- Matériel de soudure et découpe\n- Équipements de manutention\n\n👥 Équipe locale :\n- 1 responsable d'agence\n- 3 techniciens qualifiés\n- 2 opérateurs d'équipements\n- 1 commercial\n\nServices proposés :\n✅ Location d'équipements de chantier\n✅ Maintenance industrielle\n✅ Support technique\n✅ Formation du personnel client\n✅ Livraison et installation\n\nObjectifs :\n- Réduire les délais de livraison\n- Améliorer la réactivité\n- Développer notre présence régionale\n- Créer des emplois locaux\n\nOuverture prévue : 1er trimestre 2025\n\nCette expansion témoigne de notre croissance et de notre engagement à servir nos clients sur l'ensemble du territoire camerounais.",
                'statut' => 'brouillon',
                'date_publication' => null,
                'meta_description' => ['fr' => 'SIPN ouvre une nouvelle agence à Yaoundé pour mieux servir la région du Centre avec des équipements dédiés.'],
                'meta_keywords' => ['fr' => 'expansion, Yaoundé, nouvelle agence, équipements chantier'],
            ],
        ];

        foreach ($actualites as $actualiteData) {
            // Assigner une catégorie aléatoire si des catégories existent
            if ($categories->count() > 0) {
                $actualiteData['category_id'] = $categories->random()->id;
            }

            // Générer le slug
            $actualiteData['slug'] = Str::slug($actualiteData['titre']);

            $actualite = Actualite::create($actualiteData);

            // Ajouter quelques images d'exemple pour les actualités publiées
            // Seulement si la table actualite_images existe
            if ($actualite->statut === 'publie' && \Schema::hasTable('actualite_images')) {
                try {
                    $this->addSampleImages($actualite);
                } catch (\Exception $e) {
                    // Ignorer les erreurs d'images pour le moment
                }
            }
        }
    }

    /**
     * Ajouter des images d'exemple à une actualité
     */
    private function addSampleImages(Actualite $actualite)
    {
        // Créer des images d'exemple (vous pouvez remplacer par de vraies images)
        $sampleImages = [
            [
                'image_path' => 'actualites/gallery/sample1.jpg',
                'alt_text' => 'Vue d\'ensemble du projet',
                'caption' => 'Vue d\'ensemble du chantier en cours de construction',
                'order' => 0,
            ],
            [
                'image_path' => 'actualites/gallery/sample2.jpg',
                'alt_text' => 'Équipe au travail',
                'caption' => 'Notre équipe technique en action',
                'order' => 1,
            ],
            [
                'image_path' => 'actualites/gallery/sample3.jpg',
                'alt_text' => 'Équipements utilisés',
                'caption' => 'Les équipements de pointe utilisés pour ce projet',
                'order' => 2,
            ],
        ];

        foreach ($sampleImages as $imageData) {
            ActualiteImage::create([
                'actualite_id' => $actualite->id,
                'image_path' => $imageData['image_path'],
                'alt_text' => $imageData['alt_text'],
                'caption' => $imageData['caption'],
                'order' => $imageData['order'],
            ]);
        }
    }
}