@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier la tâche</h2>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Titre</label>
        <input type="text" name="title" value="{{ $task->title }}" class="form-control">

        <label>Description</label>
        <textarea name="description" class="form-control">{{ $task->description }}</textarea>

        <label for="status">Statut :</label>
<select name="status" id="status" required>
    <option value="À faire" {{ $task->status == 'À faire' ? 'selected' : '' }}>À faire</option>
    <option value="En cours" {{ $task->status == 'En cours' ? 'selected' : '' }}>En cours</option>
    <option value="Terminé" {{ $task->status == 'Terminé' ? 'selected' : '' }}>Terminé</option>
</select>

        <label>Projet</label>
        <select name="project_id" class="form-control">
            @foreach ($projects as $project)
                <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                    {{ $project->name }}
                </option>
            @endforeach
        </select>

        <label>Assignée à</label>
        <select name="user_id" class="form-control">
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>

        <br>
        <button class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection