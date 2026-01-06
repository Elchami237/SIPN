<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        // Récupérer la langue depuis la session, sinon utiliser la langue par défaut
        $locale = Session::get('locale', config('app.locale'));
        
        // Définir la langue de l'application
        App::setLocale($locale);

        return $next($request);
    }
}
