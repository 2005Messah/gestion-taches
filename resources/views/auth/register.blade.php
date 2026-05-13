<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscription</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background:linear-gradient(135deg,#6f42c1,#5b34a1);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .register-card{
            width:100%;
            max-width:450px;
            border:none;
            border-radius:20px;
            overflow:hidden;
        }

        .btn-purple{
            background:#6f42c1;
            color:white;
        }

        .btn-purple:hover{
            background:#5b34a1;
            color:white;
        }

    </style>

</head>

<body>

<div class="card shadow-lg register-card">

    <div class="card-body p-5">

        <h2 class="text-center mb-4 fw-bold">
            Inscription
        </h2>

        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('register') }}"
              method="POST">

            @csrf

            {{-- Nom --}}
            <div class="mb-3">

                <label class="form-label">
                    Nom
                </label>

                <input type="text"
                       name="name"
                       class="form-control"
                       required>

            </div>

            {{-- Email --}}
            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input type="email"
                       name="email"
                       class="form-control"
                       required>

            </div>

            {{-- Password --}}
            <div class="mb-3">

                <label class="form-label">
                    Mot de passe
                </label>

                <input type="password"
                       name="password"
                       class="form-control"
                       required>

            </div>

            {{-- Confirm --}}
            <div class="mb-4">

                <label class="form-label">
                    Confirmation mot de passe
                </label>

                <input type="password"
                       name="password_confirmation"
                       class="form-control"
                       required>

            </div>

            <button type="submit"
                    class="btn btn-purple w-100">

                S'inscrire

            </button>

        </form>

        <div class="text-center mt-3">

            <a href="{{ route('login') }}">
                Déjà un compte ? Se connecter
            </a>

        </div>

    </div>

</div>

</body>
</html>