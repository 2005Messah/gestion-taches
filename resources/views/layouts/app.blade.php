<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Gestion des tâches')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>

        *{
            font-family: 'Poppins', sans-serif;
        }

        body{
            background:#f4f6f9;
            overflow-x:hidden;
        }

        /* Sidebar */

        #sidebar-wrapper{
            min-height:100vh;
            width:260px;
            background:linear-gradient(180deg,#6f42c1,#5b34a1);
            transition:0.3s;
        }

        .sidebar-heading{
            font-size:22px;
            font-weight:700;
            color:white;
            border-bottom:1px solid rgba(255,255,255,0.1);
        }

        .list-group-item{
            background:transparent !important;
            border:none !important;
            color:white !important;
            padding:15px 20px;
            font-weight:500;
            transition:0.3s;
        }

        .list-group-item:hover{
            background:rgba(255,255,255,0.15) !important;
            padding-left:28px;
        }

        .list-group-item.active{
            background:white !important;
            color:#6f42c1 !important;
            border-radius:10px;
            margin:5px 10px;
        }

        /* Content */

        #page-content-wrapper{
            width:100%;
        }

        .navbar{
            background:white !important;
            box-shadow:0 2px 10px rgba(0,0,0,0.05);
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

        /* Responsive */

        @media(max-width:768px){

            #sidebar-wrapper{
                margin-left:-260px;
                position:fixed;
                z-index:999;
            }

            #wrapper.toggled #sidebar-wrapper{
                margin-left:0;
            }

        }

    </style>

</head>

<body>

<div class="d-flex" id="wrapper">

    {{-- Sidebar --}}
    <div id="sidebar-wrapper">

        <div class="sidebar-heading py-4 text-center">
            📋 Gestion Tâches
        </div>

        <div class="list-group list-group-flush mt-3">

            <a href="{{ route('dashboard') }}"
               class="list-group-item">
                Dashboard
            </a>

            <a href="{{ route('projects.index') }}"
               class="list-group-item">
                Projets
            </a>

            <a href="{{ route('tasks.index') }}"
               class="list-group-item">
                Tâches
            </a>

            {{-- Déconnexion --}}
            <form action="{{ route('logout') }}"
                  method="POST">

                @csrf

                <button type="submit"
                        class="list-group-item w-100 text-start border-0">
                    Déconnexion
                </button>

            </form>

        </div>

    </div>

    {{-- Contenu --}}
    <div id="page-content-wrapper">

        {{-- Navbar --}}
        <nav class="navbar navbar-expand-lg px-4 py-3">

            <button class="btn btn-purple"
                    id="menu-toggle">

                ☰

            </button>

        </nav>

        {{-- Main Content --}}
        <div class="container-fluid p-4">

            @yield('content')

        </div>

    </div>

</div>

{{-- Bootstrap --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>

    const toggleButton = document.getElementById('menu-toggle');
    const wrapper = document.getElementById('wrapper');

    toggleButton.addEventListener('click', () => {
        wrapper.classList.toggle('toggled');
    });

</script>

</body>
</html>