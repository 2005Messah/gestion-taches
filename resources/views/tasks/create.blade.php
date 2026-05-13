@extends('layouts.app')

@section('title', 'Nouvelle tâche')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h2 class="fw-bold text-purple">
            Nouvelle tâche
        </h2>

        <p class="text-muted">
            Ajouter une nouvelle tâche au système.
        </p>
    </div>

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-body p-5">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('tasks.store') }}"
                          method="POST">

                        @csrf

                        {{-- Titre --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                Titre
                            </label>

                            <input type="text"
                                   name="title"
                                   class="form-control custom-input"
                                   required>
                        </div>

                        {{-- Description --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                Description
                            </label>

                            <textarea name="description"
                                      rows="4"
                                      class="form-control custom-input"></textarea>
                        </div>

                        {{-- Status --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                Statut
                            </label>

                            <select name="status"
                                    class="form-select custom-input"
                                    required>

                                <option value="À faire">À faire</option>
                                <option value="En cours">En cours</option>
                                <option value="Terminé">Terminé</option>

                            </select>
                        </div>

                        {{-- Projet --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                Projet
                            </label>

                            <select name="project_id"
                                    class="form-select custom-input"
                                    required>

                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}">
                                        {{ $project->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        {{-- Utilisateur --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                Assigné à
                            </label>

                            <select name="assigned_to"
                                    class="form-select custom-input">

                                <option value="">
                                    Aucun utilisateur
                                </option>

                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        {{-- Boutons --}}
                        <div class="d-flex justify-content-between">

                            <a href="{{ route('tasks.index') }}"
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

<style>

.text-purple{
    color:#6f42c1;
}

.btn-purple{
    background:#6f42c1;
    color:white;
    border:none;
}

.btn-purple:hover{
    background:#5b34a1;
    color:white;
}

.custom-input{
    border-radius:12px;
    padding:12px;
}

.card{
    border-radius:20px;
}

</style>

@endsection