<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects.
     */
    public function index()
    {
        $projects = Project::latest()->paginate(15);
        
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created project.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title.fr' => 'required|string|max:255',
            'title.en' => 'nullable|string|max:255',
            'description.fr' => 'required|string',
            'description.en' => 'nullable|string',
            'client' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'category' => 'required|in:construction,genie_civil,location,travaux_publics',
            'featured_image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'is_featured' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('featured_image')) {
            $imageService = app(\App\Services\ImageUploadService::class);
            $paths = $imageService->upload($request->file('featured_image'), 'projects');
            $validated['featured_image'] = $paths['original'];
        }

        $validated['slug'] = Str::slug($validated['title']['fr']);
        $validated['is_featured'] = $request->has('is_featured');

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Projet créé avec succès.');
    }

    /**
     * Display the specified project.
     */
    public function show($id)
    {
        $project = Project::with('images')->findOrFail($id);
        
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified project.
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified project.
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'title.fr' => 'required|string|max:255',
            'title.en' => 'nullable|string|max:255',
            'description.fr' => 'required|string',
            'description.en' => 'nullable|string',
            'client' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'category' => 'required|in:construction,genie_civil,location,travaux_publics',
            'featured_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'is_featured' => 'boolean',
        ]);

        // Handle image upload if new image provided
        if ($request->hasFile('featured_image')) {
            $imageService = app(\App\Services\ImageUploadService::class);
            
            // Delete old image
            if ($project->featured_image) {
                $imageService->delete($project->featured_image);
            }
            
            $paths = $imageService->upload($request->file('featured_image'), 'projects');
            $validated['featured_image'] = $paths['original'];
        }

        $validated['is_featured'] = $request->has('is_featured');

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Projet mis à jour avec succès.');
    }

    /**
     * Remove the specified project.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Projet supprimé avec succès.');
    }
}
