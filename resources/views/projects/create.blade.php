@extends('layouts.app')

@section('title', 'Nouveau Projet')

@section('content')

<div class="container-fluid">

    {{-- Titre --}}
    <div class="mb-4">
        <h2 class="fw-bold text-purple">Créer un nouveau projet</h2>
        <p class="text-muted">
            Ajoute un nouveau projet dans le système de gestion.
        </p>
    </div>

    {{-- Carte formulaire --}}
    <div class="row justify-content-center">
        <div class="col-lg-7">

            <div class="card border-0 shadow-sm project-card">

                <div class="card-body p-5">

                    {{-- Messages erreurs --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Formulaire --}}
                    <form action="{{ route('projects.store') }}" method="POST">

                        @csrf

                        {{-- Nom --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Nom du projet
                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control custom-input"
                                   placeholder="Entrez le nom du projet"
                                   required>
                        </div>

                        {{-- Description --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Description
                            </label>

                            <textarea name="description"
                                      rows="5"
                                      class="form-control custom-input"
                                      placeholder="Décrivez le projet"></textarea>
                        </div>

                        {{-- Boutons --}}
                        <div class="d-flex justify-content-between">

                            <a href="{{ route('projects.index') }}"
                               class="btn btn-outline-secondary px-4">
                                Retour
                            </a>

                            <button type="submit"
                                    class="btn btn-purple px-5">
                                Enregistrer
                            </button>

                        </div>

                    </form>

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

    .btn-purple{
        background:#6f42c1;
        border:none;
        color:white;
        transition:0.3s;
    }

    .btn-purple:hover{
        background:#5b34a1;
        color:white;
    }

    .project-card{
        border-radius:20px;
        overflow:hidden;
        transition:0.3s;
        background:white;
    }

    .project-card:hover{
        transform:translateY(-4px);
        box-shadow:0 10px 30px rgba(0,0,0,0.12);
    }

    .custom-input{
        border-radius:12px;
        padding:12px;
        border:1px solid #ddd;
        transition:0.3s;
    }

    .custom-input:focus{
        border-color:#6f42c1;
        box-shadow:0 0 0 0.15rem rgba(111,66,193,0.25);
    }

</style>

@endsection