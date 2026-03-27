<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    // Liste des projets
    public function index()
    {
        $projects = Project::all();  // OK
        return view('projects.index', compact('projects'));
    }

    // Formulaire création projet
    public function create()
    {
        return view('projects.create');
    }

    // Sauvegarde projet
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Project::create([
    'name' => $request->name,
    'description' => $request->description,
    'created_by' => auth()->id(),
]);

        return redirect()->route('projects.index')
            ->with('success', 'Projet créé avec succès !');
    }
}