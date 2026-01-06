<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Quote;
use App\Models\Actualite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistiques avec vérification de l'existence de la table
        $stats = [
            'unread_contacts' => Contact::where('is_read', false)->count(),
            'pending_quotes' => Quote::where('status', 'pending')->count(),
        ];

        // Ajouter les stats des actualités seulement si la table existe
        if (Schema::hasTable('actualites')) {
            try {
                $stats['total_actualites'] = Actualite::count();
                $stats['actualites_publiees'] = Actualite::where('statut', 'publie')->count();
                $stats['actualites_brouillons'] = Actualite::where('statut', 'brouillon')->count();
            } catch (\Exception $e) {
                $stats['total_actualites'] = 0;
                $stats['actualites_publiees'] = 0;
                $stats['actualites_brouillons'] = 0;
            }
        } else {
            $stats['total_actualites'] = 0;
            $stats['actualites_publiees'] = 0;
            $stats['actualites_brouillons'] = 0;
        }

        $recent_contacts = Contact::latest()->take(5)->get();
        $recent_quotes = Quote::latest()->take(5)->get();
        
        // Actualités récentes seulement si la table existe
        $recent_actualites = collect();
        if (Schema::hasTable('actualites')) {
            try {
                $recent_actualites = Actualite::latest()->take(5)->get();
            } catch (\Exception $e) {
                $recent_actualites = collect();
            }
        }

        return view('admin.dashboard', compact('stats', 'recent_contacts', 'recent_quotes', 'recent_actualites'));
    }
}
