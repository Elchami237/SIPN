<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Actualite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::where('is_featured', true)
            ->latest()
            ->take(3)
            ->get();

        // Services mis en avant (6 premiers)
        $featuredServices = Service::where('is_active', true)
            ->orderBy('order')
            ->take(6)
            ->get();

        // Actualités récentes (3 dernières) - seulement si la table existe
        $actualitesRecentes = collect();
        if (Schema::hasTable('actualites')) {
            try {
                // Vérifier aussi que le modèle Actualite existe et fonctionne
                if (class_exists('App\Models\Actualite')) {
                    $actualitesRecentes = Actualite::publie()
                        ->recent()
                        ->with('category')
                        ->take(3)
                        ->get();
                }
            } catch (\Exception $e) {
                // Si erreur, on continue avec une collection vide
                $actualitesRecentes = collect();
            }
        }

        return view('home', compact('featuredProjects', 'featuredServices', 'actualitesRecentes'));
    }



    public function about()
    {
        return view('about');
    }
}
