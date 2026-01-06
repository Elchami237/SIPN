<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoPage;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    /**
     * Display SEO settings for all pages.
     */
    public function index()
    {
        $pages = SeoPage::all();
        
        // If no pages exist, create default ones
        if ($pages->isEmpty()) {
            $defaultPages = [
                'home' => 'Page d\'accueil',
                'services' => 'Services',
                'contact' => 'Contact',
                'quote' => 'Demande de devis',
            ];

            foreach ($defaultPages as $slug => $name) {
                SeoPage::create([
                    'page_name' => $name,
                    'page_slug' => $slug,
                    'meta_title' => [
                        'fr' => $name . ' - S.I.P.N.',
                        'en' => $name . ' - S.I.P.N.',
                    ],
                    'meta_description' => [
                        'fr' => '',
                        'en' => '',
                    ],
                ]);
            }

            $pages = SeoPage::all();
        }
        
        return view('admin.seo.index', compact('pages'));
    }

    /**
     * Update SEO settings for a specific page.
     */
    public function update(Request $request, $page)
    {
        $seoPage = SeoPage::where('page_slug', $page)->firstOrFail();

        $validated = $request->validate([
            'meta_title.fr' => 'required|string|max:60',
            'meta_title.en' => 'nullable|string|max:60',
            'meta_description.fr' => 'required|string|max:160',
            'meta_description.en' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string',
            'og_title' => 'nullable|string|max:60',
            'og_description' => 'nullable|string|max:160',
            'og_image' => 'nullable|url',
        ]);

        $seoPage->update($validated);

        return redirect()->route('admin.seo.index')->with('success', 'Paramètres SEO mis à jour avec succès.');
    }
}
