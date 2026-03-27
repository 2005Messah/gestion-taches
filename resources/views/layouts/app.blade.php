<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Tâches - Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="d-flex" id="wrapper">

    {{-- Sidebar --}}
    <div class="bg-purple text-white" id="sidebar-wrapper">
        <div class="sidebar-heading py-4 text-center">
            <h4>Douce Saveur</h4>
        </div>
        <div class="list-group list-group-flush">
            <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action bg-purple text-white">Dashboard</a>
            <a href="{{ route('projects.index') }}" class="list-group-item list-group-item-action bg-purple text-white">Projets</a>
            <a href="{{ route('tasks.index') }}" class="list-group-item list-group-item-action bg-purple text-white">Tâches</a>
            <a href="{{ route('logout') }}" class="list-group-item list-group-item-action bg-purple text-white">Déconnexion</a>
        </div>
    </div>

    {{-- Page Content --}}
    <div id="page-content-wrapper" class="flex-fill">

        {{-- Navbar --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <button class="btn btn-purple" id="menu-toggle">☰</button>
                <span class="ms-3 fw-bold">Dashboard</span>
            </div>
        </nav>

        {{-- Main content --}}
        <div class="container-fluid p-4">
            @yield('content')
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS -->
<script>
    // Toggle sidebar
    const toggleButton = document.getElementById('menu-toggle');
    const wrapper = document.getElementById('wrapper');
    toggleButton.addEventListener('click', () => {
        wrapper.classList.toggle('toggled');
    });
</script>
</body>
</html>