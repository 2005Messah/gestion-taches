
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des tâches </title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f8f9fc;
            overflow-x: hidden;
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #6f42c1, #8e63e6);
            color: white;
            padding: 60px 0;
        }

        .hero h1 {
            font-size: 3.2rem;
            font-weight: 700;
        }

        .hero p {
            font-size: 1.1rem;
            margin-top: 20px;
            line-height: 1.8;
        }

        .btn-purple {
            background: white;
            color: #6f42c1;
            border-radius: 30px;
            padding: 12px 30px;
            font-weight: 600;
            transition: 0.3s;
            border: none;
        }

        .btn-purple:hover {
            background: #f1f1f1;
            transform: translateY(-2px);
        }

        .feature-card {
            border: none;
            border-radius: 20px;
            transition: 0.3s;
            padding: 30px;
            background: white;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .section-title {
            color: #6f42c1;
            font-weight: 700;
        }

        footer {
            background: #6f42c1;
            color: white;
            padding: 20px 0;
        }

        .hero-image {
            width: 100%;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0px);
            }
        }
    </style>
</head>
<body>

<!-- HERO SECTION -->
<section class="hero">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 mb-5 mb-lg-0">
                <h1>Gestion des tâches collaboratives</h1>

                <p>
                    Une plateforme moderne permettant de gérer efficacement les projets,
                    les tâches et les utilisateurs de l’entreprise Douce Saveur.
                </p>

                <div class="mt-4 d-flex gap-3 flex-wrap">
                    <a href="{{ route('login') }}" class="btn btn-purple">
                        Se connecter
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-outline-light rounded-pill px-4 py-2">
                        Créer un compte
                    </a>
                </div>
            </div>

            <div class="col-lg-6 text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/9068/9068676.png"
                     class="hero-image"
                     width="450"
                     alt="Gestion tâches">
            </div>

        </div>
    </div>
</section>

<!-- FEATURES -->
<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="section-title">Fonctionnalités principales</h2>
            <p>Une application complète de gestion de projets et de tâches.</p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="feature-card h-100 text-center">
                    <h4 class="mb-3">Gestion des projets</h4>
                    <p>
                        Créez et organisez facilement vos projets.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card h-100 text-center">
                    <h4 class="mb-3">Gestion des tâches</h4>
                    <p>
                        Ajoutez, modifiez et suivez l’évolution des tâches.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card h-100 text-center">
                    <h4 class="mb-3">Tableau de bord</h4>
                    <p>
                        Visualisez les statistiques grâce à un dashboard moderne.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ABOUT -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="section-title mb-4">À propos du projet</h2>

        <p class="mx-auto" style="max-width: 850px; line-height: 1.9;">
            Ce projet a été développé avec Laravel dans le but de faciliter
            la gestion des tâches et des projets d’une entreprise.
            Il permet de centraliser les informations, d’attribuer des tâches
            aux utilisateurs et de suivre l’avancement des activités.
        </p>
    </div>
</section>

<!-- FOOTER -->
<footer class="text-center">
    <div class="container">
        <p class="mb-0">
            © 2026 - Application de gestion des tâches 
        </p>
    </div>
</footer>

</body>
</html>
