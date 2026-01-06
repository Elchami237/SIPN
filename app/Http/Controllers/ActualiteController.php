<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Category;
use Illuminate\Http\Request;

class ActualiteController extends Controller
{
    /**
     * Afficher la liste des actualités
     */
    public function index(Request $request)
    {
        $query = Actualite::publie()->recent()->with('category');

        // Filtrage par catégorie
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Recherche
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('titre', 'like', "%{$search}%")
                  ->orWhere('resume', 'like', "%{$search}%")
                  ->orWhere('contenu', 'like', "%{$search}%");
            });
        }

        $actualites = $query->paginate(9);
        $categories = Category::whereHas('actualites', function ($q) {
            $q->publie();
        })->get();

        return view('actualites.index', compact('actualites', 'categories'));
    }

    /**
     * Afficher une actualité spécifique
     */
    public function show($slug)
    {
        $actualite = Actualite::where('slug', $slug)
            ->publie()
            ->with(['category', 'images'])
            ->firstOrFail();

        // Actualités similaires
        $actualitesSimilaires = Actualite::publie()
            ->where('id', '!=', $actualite->id)
            ->when($actualite->category_id, function ($query) use ($actualite) {
                $query->where('category_id', $actualite->category_id);
            })
            ->recent()
            ->take(3)
            ->get();

        return view('actualites.show', compact('actualite', 'actualitesSimilaires'));
    }
}