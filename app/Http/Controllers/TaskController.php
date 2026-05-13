<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['project', 'user'])->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $projects = Project::all();
        $users = User::all();
        return view('tasks.create', compact('projects', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:À faire,En cours,Terminé',
            'project_id' => 'required|exists:projects,id',
            'assigned_to' => 'nullable|exists:users,id'
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès');
    }

    public function edit(Task $task)
    {
        $projects = Project::all();
        $users = User::all();

        return view('tasks.edit', compact('task', 'projects', 'users'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:À faire,En cours,Terminé',
            'project_id' => 'required|exists:projects,id',
            'assigned_to' => 'nullable|exists:users,id'
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée');
    }
}