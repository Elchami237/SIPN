<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)
            ->orderBy('order')
            ->orderBy('name')
            ->get();

        // Grouper par catégorie
        $servicesByCategory = $services->groupBy('category');

        return view('services.index', compact('services', 'servicesByCategory'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Services similaires (même catégorie)
        $relatedServices = Service::where('category', $service->category)
            ->where('id', '!=', $service->id)
            ->where('is_active', true)
            ->take(3)
            ->get();

        return view('services.show', compact('service', 'relatedServices'));
    }
}
