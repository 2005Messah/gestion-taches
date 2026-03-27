<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;

class TaskController extends Controller
{
    // Liste des tâches
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // Formulaire création
    public function create()
    {
        $projects = Project::all();
        $users = User::all();
        return view('tasks.create', compact('projects', 'users'));
    }

    // Enregistrement d'une nouvelle tâche
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:À faire,En cours,Terminé',
            'project_id' => 'required|integer',
            'assigned_to' => 'nullable|integer'
        ]);

        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès !');
    }

    // Formulaire modification
    public function edit(Task $task)
    {
        $projects = Project::all();
        $users = User::all();
        return view('tasks.edit', compact('task', 'projects', 'users'));
    }

    // Mise à jour d'une tâche
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:À faire,En cours,Terminé',
            'project_id' => 'required|integer',
            'assigned_to' => 'nullable|integer'
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour avec succès.');
    }

    // Suppression d'une tâche
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée.');
    }
}