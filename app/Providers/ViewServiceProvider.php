<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\View\Composers\NavigationComposer;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Partager les services de navigation avec le layout public
        View::composer('components.public-layout', NavigationComposer::class);
    }
}
