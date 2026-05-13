@extends('layouts.app')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-purple">Gestion des tâches</h2>
            <p class="text-muted">Liste complète des tâches</p>
        </div>

        <a href="{{ route('tasks.create') }}" class="btn btn-purple shadow-sm">
            + Nouvelle tâche
        </a>
    </div>

    {{-- MESSAGE SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABLE CARD --}}
    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle table-hover">

                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Statut</th>
                            <th>Projet</th>
                            <th>Utilisateur</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($tasks as $task)

                        <tr>

                            <td>
                                <span class="fw-bold">
                                    #{{ $task->id }}
                                </span>
                            </td>

                            <td>
                                <span class="fw-semibold">
                                    {{ $task->title }}
                                </span>
                            </td>

                            <td>
                                {{ $task->description }}
                            </td>

                            <td>

                                @if($task->status == 'À faire')

                                    <span class="badge bg-secondary px-3 py-2">
                                        À faire
                                    </span>

                                @elseif($task->status == 'En cours')

                                    <span class="badge bg-warning text-dark px-3 py-2">
                                        En cours
                                    </span>

                                @else

                                    <span class="badge bg-success px-3 py-2">
                                        Terminé
                                    </span>

                                @endif

                            </td>

                            <td>
                                {{ optional($task->project)->name ?? 'Aucun projet' }}
                            </td>

                            <td>
                                {{ optional($task->user)->name ?? 'Non assigné' }}
                            </td>

                            <td>

                                <div class="d-flex justify-content-center gap-2">

                                    {{-- MODIFIER --}}
                                    <a href="{{ route('tasks.edit', $task->id) }}"
                                       class="btn btn-sm btn-info text-white">
                                        Modifier
                                    </a>

                                    {{-- SUPPRIMER --}}
                                    <form action="{{ route('tasks.destroy', $task->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Supprimer cette tâche ?')">

                                            Supprimer

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                Aucune tâche disponible
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

{{-- STYLE --}}
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
        background:#5b35a3;
        color:white;
    }

    .card{
        overflow:hidden;
    }

    table tbody tr{
        transition:0.2s;
    }

    table tbody tr:hover{
        background:#f8f5ff;
        transform:scale(1.01);
    }

</style>

@endsection