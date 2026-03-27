@extends('layouts.app')

@section('title', 'Projets')

@section('content')

<div class="d-flex justify-content-between mb-4">
    <h3>Liste des projets</h3>
    <a href="{{ route('projects.create') }}" class="btn btn-purple">Nouveau projet</a>
</div>

<div class="row">

    @forelse($projects as $project)
    <div class="col-md-4">
        <div class="card card-task mb-4 p-3">
            <h5>{{ $project->name }}</h5>
            <p>{{ $project->description }}</p>

            <div class="d-flex justify-content-between mt-3">
                <a href="#" class="btn btn-sm btn-outline-purple">Voir</a>
                <a href="#" class="btn btn-sm btn-outline-danger">Supprimer</a>
            </div>
        </div>
    </div>
    @empty
        <p>Aucun projet trouvé.</p>
    @endforelse
</div>

@endsection