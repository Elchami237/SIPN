<?php

namespace App\View\Composers;

use App\Models\Service;
use Illuminate\View\View;

class NavigationComposer
{
    public function compose(View $view)
    {
        // Récupérer les services pour la navigation (4 premiers de chaque catégorie principale)
        $navServices = Service::where('is_active', true)
            ->orderBy('order')
            ->orderBy('name')
            ->take(8)
            ->get();

        // Grouper par catégorie pour le footer
        $footerServices = Service::where('is_active', true)
            ->orderBy('order')
            ->take(4)
            ->get();

        $view->with([
            'navServices' => $navServices,
            'footerServices' => $footerServices
        ]);
    }
}
