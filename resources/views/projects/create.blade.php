@extends('layouts.app')

@section('title', 'Créer un projet')

@section('content')

<h3 class="mb-4">Créer un nouveau projet</h3>

<form method="POST" action="{{ route('projects.store') }}">
    @csrf

    <div class="form-group mb-3">
        <label>Nom du projet</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <button class="btn btn-purple">Créer</button>
</form>

@endsection