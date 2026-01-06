<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switch(Request $request, $locale)
    {
        // Vérifier que la langue est supportée
        if (!in_array($locale, ['fr', 'en'])) {
            abort(400);
        }

        // Stocker la langue dans la session
        Session::put('locale', $locale);
        
        // Définir la langue de l'application
        App::setLocale($locale);

        // Rediriger vers la page précédente
        return redirect()->back();
    }
}
