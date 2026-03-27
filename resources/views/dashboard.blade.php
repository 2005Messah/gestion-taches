@extends('layouts.app')

@section('content')
<div class="container mt-4">

    {{-- Statistiques --}}
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card p-3 text-center shadow-sm">
                <h5>Total projets</h5>
                <h2>{{ $projects->count() }}</h2>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3 text-center shadow-sm">
                <h5>Total tâches</h5>
                <h2>{{ $tasks->count() }}</h2>
            </div>
        </div>
    </div>

    {{-- Liste des tâches --}}
    <div class="row mb-4">
        @foreach($tasks as $task)
        <div class="col-md-4">
            <div class="card card-task p-3 mb-4 shadow-sm border-primary">
                <h5 class="text-primary">{{ $task->title }}</h5>
                <p>{{ $task->description }}</p>
                <div class="d-flex justify-content-between flex-wrap">
                    <span class="badge bg-purple text-white mb-1">
                        Projet: {{ optional($task->project)->name ?? 'Non assigné' }}
                    </span>
                    <span class="badge bg-secondary text-white mb-1">
                        Assigné à: {{ optional($task->user)->name ?? 'Non assigné' }}
                    </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Graphique Chart.js --}}
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card p-3 shadow-sm">
                <canvas id="tasksChart" height="100"></canvas>
            </div>
        </div>
    </div>

</div>

{{-- Styles personnalisés --}}
<style>
    .bg-purple {
        background-color: #6f42c1 !important;
    }
    .card-task {
        transition: transform 0.2s;
    }
    .card-task:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
</style>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('tasksChart').getContext('2d');
    const tasksChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($projects->pluck('name')),
            datasets: [{
                label: 'Nombre de tâches',
                data: @json($projects->map(fn($p) => $p->tasks->count())),
                backgroundColor: 'rgba(111, 66, 193, 0.7)',
                borderColor: 'rgba(111, 66, 193, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    precision:0
                }
            }
        }
    });
</script>
@endsection