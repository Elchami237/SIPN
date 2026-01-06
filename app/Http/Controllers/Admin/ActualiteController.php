<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use App\Models\ActualiteImage;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ActualiteController extends Controller
{
    /**
     * Afficher la liste des actualités
     */
    public function index(Request $request)
    {
        $query = Actualite::with('category')->latest();

        // Filtrage par statut
        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }

        // Filtrage par catégorie
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Recherche
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('titre', 'like', "%{$search}%")
                  ->orWhere('resume', 'like', "%{$search}%");
            });
        }

        $actualites = $query->paginate(15);
        $categories = Category::all();

        return view('admin.actualites.index', compact('actualites', 'categories'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.actualites.create', compact('categories'));
    }

    /**
     * Enregistrer une nouvelle actualité
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'resume' => 'required|string|max:500',
            'contenu' => 'required|string',
            'image_affiche' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_captions.*' => 'nullable|string|max:255',
            'statut' => 'required|in:brouillon,publie',
            'date_publication' => 'nullable|date',
            'category_id' => 'nullable|exists:categories,id',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string',
        ]);

        // Gestion de l'upload d'image d'affiche
        if ($request->hasFile('image_affiche')) {
            $validated['image_affiche'] = $request->file('image_affiche')
                ->store('actualites', 'public');
        }

        // Génération du slug
        $validated['slug'] = Str::slug($validated['titre']);
        
        // Gestion de la date de publication
        if ($validated['statut'] === 'publie' && !$validated['date_publication']) {
            $validated['date_publication'] = now();
        }

        // Conversion des meta données en JSON
        if ($validated['meta_description']) {
            $validated['meta_description'] = ['fr' => $validated['meta_description']];
        }
        if ($validated['meta_keywords']) {
            $validated['meta_keywords'] = ['fr' => $validated['meta_keywords']];
        }

        $actualite = Actualite::create($validated);

        // Gestion des images de galerie
        if ($request->hasFile('gallery_images')) {
            $this->handleGalleryImages($request, $actualite);
        }

        return redirect()->route('admin.actualites.index')
            ->with('success', 'Actualité créée avec succès.');
    }

    /**
     * Afficher une actualité
     */
    public function show(Actualite $actualite)
    {
        return view('admin.actualites.show', compact('actualite'));
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function edit(Actualite $actualite)
    {
        $categories = Category::all();
        return view('admin.actualites.edit', compact('actualite', 'categories'));
    }

    /**
     * Mettre à jour une actualité
     */
    public function update(Request $request, Actualite $actualite)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'resume' => 'required|string|max:500',
            'contenu' => 'required|string',
            'image_affiche' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_captions.*' => 'nullable|string|max:255',
            'statut' => 'required|in:brouillon,publie',
            'date_publication' => 'nullable|date',
            'category_id' => 'nullable|exists:categories,id',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string',
        ]);

        // Gestion de l'upload d'image
        if ($request->hasFile('image_affiche')) {
            // Supprimer l'ancienne image
            if ($actualite->image_affiche) {
                Storage::disk('public')->delete($actualite->image_affiche);
            }
            $validated['image_affiche'] = $request->file('image_affiche')
                ->store('actualites', 'public');
        }

        // Génération du slug si le titre a changé
        if ($actualite->titre !== $validated['titre']) {
            $validated['slug'] = Str::slug($validated['titre']);
        }

        // Gestion de la date de publication
        if ($validated['statut'] === 'publie' && !$validated['date_publication']) {
            $validated['date_publication'] = now();
        }

        // Conversion des meta données en JSON
        if ($validated['meta_description']) {
            $validated['meta_description'] = ['fr' => $validated['meta_description']];
        }
        if ($validated['meta_keywords']) {
            $validated['meta_keywords'] = ['fr' => $validated['meta_keywords']];
        }

        $actualite->update($validated);

        // Gestion des nouvelles images de galerie
        if ($request->hasFile('gallery_images')) {
            $this->handleGalleryImages($request, $actualite);
        }

        return redirect()->route('admin.actualites.index')
            ->with('success', 'Actualité mise à jour avec succès.');
    }

    /**
     * Supprimer une actualité
     */
    public function destroy(Actualite $actualite)
    {
        // Supprimer l'image associée
        if ($actualite->image_affiche) {
            Storage::disk('public')->delete($actualite->image_affiche);
        }

        $actualite->delete();

        return redirect()->route('admin.actualites.index')
            ->with('success', 'Actualité supprimée avec succès.');
    }

    /**
     * Gérer les images de galerie
     */
    private function handleGalleryImages(Request $request, Actualite $actualite)
    {
        if ($request->hasFile('gallery_images')) {
            $galleryImages = $request->file('gallery_images');
            $captions = $request->input('gallery_captions', []);

            foreach ($galleryImages as $index => $image) {
                if ($image && $image->isValid()) {
                    $imagePath = $image->store('actualites/gallery', 'public');
                    
                    ActualiteImage::create([
                        'actualite_id' => $actualite->id,
                        'image_path' => $imagePath,
                        'caption' => $captions[$index] ?? null,
                        'alt_text' => $captions[$index] ?? $actualite->titre,
                        'order' => $index,
                    ]);
                }
            }
        }
    }

    /**
     * Supprimer une image de galerie
     */
    public function deleteGalleryImage(ActualiteImage $image)
    {
        // Supprimer le fichier
        if (Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        // Supprimer l'enregistrement
        $image->delete();

        return response()->json(['success' => true]);
    }
}