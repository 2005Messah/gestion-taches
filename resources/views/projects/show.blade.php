@extends('layouts.app')

@section('title', 'Détails du projet')

@section('content')

<div class="container-fluid">

    {{-- En-tête --}}
    <div class="mb-4">
        <h2 class="fw-bold text-purple">
            Détails du projet
        </h2>

        <p class="text-muted">
            Informations complètes du projet sélectionné.
        </p>
    </div>

    {{-- Carte principale --}}
    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-lg project-card">

                {{-- Header --}}
                <div class="card-header bg-purple text-white p-4 border-0">
                    <h3 class="mb-0 fw-bold">
                        {{ $project->name }}
                    </h3>
                </div>

                {{-- Body --}}
                <div class="card-body p-5">

                    {{-- Description --}}
                    <div class="mb-4">

                        <h5 class="fw-bold text-dark mb-3">
                            Description
                        </h5>

                        <div class="project-description">
                            {{ $project->description ?? 'Aucune description disponible.' }}
                        </div>

                    </div>

                    {{-- Informations --}}
                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <div class="info-box">

                                <span class="info-title">
                                    Date de création
                                </span>

                                <h6 class="mt-2">
                                    {{ $project->created_at->format('d/m/Y') }}
                                </h6>

                            </div>

                        </div>

                        <div class="col-md-6 mb-3">

                            <div class="info-box">

                                <span class="info-title">
                                    Dernière modification
                                </span>

                                <h6 class="mt-2">
                                    {{ $project->updated_at->format('d/m/Y') }}
                                </h6>

                            </div>

                        </div>

                    </div>

                    {{-- Boutons --}}
                    <div class="d-flex justify-content-between mt-5 flex-wrap gap-2">

                        <a href="{{ route('projects.index') }}"
                           class="btn btn-outline-secondary px-4">
                            Retour
                        </a>

                        <form action="{{ route('projects.destroy', $project->id) }}"
                              method="POST"
                              onsubmit="return confirm('Supprimer ce projet ?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger px-4">
                                Supprimer
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- Styles --}}
<style>

    .text-purple{
        color:#6f42c1;
    }

    .bg-purple{
        background:#6f42c1;
    }

    .project-card{
        border-radius:22px;
        overflow:hidden;
        transition:0.3s;
    }

    .project-card:hover{
        transform:translateY(-5px);
        box-shadow:0 15px 35px rgba(0,0,0,0.12);
    }

    .project-description{
        background:#f8f9fa;
        padding:20px;
        border-radius:14px;
        line-height:1.7;
        color:#555;
        border-left:5px solid #6f42c1;
    }

    .info-box{
        background:white;
        border-radius:15px;
        padding:20px;
        border:1px solid #eee;
        box-shadow:0 4px 10px rgba(0,0,0,0.04);
        transition:0.3s;
    }

    .info-box:hover{
        transform:translateY(-3px);
    }

    .info-title{
        color:#6f42c1;
        font-weight:600;
        font-size:14px;
        text-transform:uppercase;
    }

</style>

@endsection