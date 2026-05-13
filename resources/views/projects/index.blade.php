@extends('layouts.app')

@section('title', 'Projets')

@section('content')

<div class="container-fluid">

    {{-- En-tête --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <div>
            <h2 class="fw-bold text-purple mb-1">Gestion des projets</h2>
            <p class="text-muted">Liste complète des projets enregistrés</p>
        </div>

        <a href="{{ route('projects.create') }}" class="btn btn-purple shadow-sm">
            + Nouveau projet
        </a>
    </div>

    {{-- Message succès --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Liste des projets --}}
    <div class="row">

        @forelse($projects as $project)

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card project-card border-0 shadow-sm h-100">

                <div class="card-body d-flex flex-column">

                    {{-- Titre --}}
                    <div class="mb-3">
                        <h4 class="fw-bold text-dark">
                            {{ $project->name }}
                        </h4>
                    </div>

                    {{-- Description --}}
                    <p class="text-muted flex-grow-1">
                        {{ $project->description ?? 'Aucune description disponible.' }}
                    </p>

                    {{-- Infos --}}
                    <div class="mb-3">
                        <span class="badge bg-purple">
                            Créé le :
                            {{ $project->created_at->format('d/m/Y') }}
                        </span>
                    </div>

                    {{-- Boutons --}}
                    <div class="d-flex justify-content-between gap-2 mt-auto">

                        {{-- Voir --}}
                        <a href="{{ route('projects.show', $project->id) }}"
                           class="btn btn-outline-purple w-50">
                            Voir
                        </a>

                        {{-- Supprimer --}}
                        <form action="{{ route('projects.destroy', $project->id) }}"
                              method="POST"
                              class="w-50"
                              onsubmit="return confirm('Supprimer ce projet ?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-outline-danger w-100">
                                Supprimer
                            </button>

                        </form>

                    </div>

                </div>
            </div>

        </div>

        @empty

        <div class="col-12">
            <div class="alert alert-info shadow-sm">
                Aucun projet trouvé.
            </div>
        </div>

        @endforelse

    </div>
</div>

{{-- Styles --}}
<style>

    .text-purple{
        color:#6f42c1;
    }

    .bg-purple{
        background:#6f42c1;
        color:white;
    }

    .btn-purple{
        background:#6f42c1;
        color:white;
        border:none;
        transition:0.3s;
    }

    .btn-purple:hover{
        background:#5a32a3;
        color:white;
    }

    .btn-outline-purple{
        border:1px solid #6f42c1;
        color:#6f42c1;
        transition:0.3s;
    }

    .btn-outline-purple:hover{
        background:#6f42c1;
        color:white;
    }

    .project-card{
        border-radius:18px;
        overflow:hidden;
        transition:0.3s ease;
        background:white;
    }

    .project-card:hover{
        transform:translateY(-6px);
        box-shadow:0 10px 25px rgba(0,0,0,0.12);
    }

    .card-body{
        padding:25px;
    }

</style>

@endsection