@extends('layouts.app')

@section('title', 'Tâches')

@section('content')

<div class="d-flex justify-content-between mb-4">
    <h3>Liste des tâches</h3>
    <a href="#" class="btn btn-purple">Nouvelle tâche</a>
</div>

<div class="row">
    @forelse($tasks as $task)
    <div class="col-md-4">
        <div class="card card-task mb-4 p-3">
            <h5>{{ $task->title }}</h5>
            <p>{{ $task->description }}</p>
            <p>
                <span class="badge badge-purple">Projet: {{ $task->project->name ?? 'Non défini' }}</span>
                <span class="badge badge-secondary">Assigné à: {{ $task->user->name ?? 'Non défini' }}</span>
            </p>
            <div class="d-flex justify-content-between mt-3">
                <a href="#" class="btn btn-sm btn-outline-purple">Modifier</a>
                <a href="#" class="btn btn-sm btn-outline-danger">Supprimer</a>
            </div>
        </div>
    </div>
    @empty
    <p>Aucune tâche trouvée.</p>
    @endforelse
</div>

<a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Modifier</a>

<form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">
        Supprimer
    </button>
</form>

@endsection