<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyVote</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/Logo.png') }}" type="image/x-icon">

    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 400px;
        }

        .card-title {
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 12px;
            font-size: 18px;
            width: 100%;
        }

        .btn-login {
    background-color: #007bff;
    color: white;
    font-size: 20px;
    padding: 12px 30px;
    border: none;
    border-radius: 5px;
    width: 100%;
    text-transform: uppercase;
    transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
}

.btn-login:hover {
    background-color: #0056b3;
    color: white;
}

    </style>
</head>
<body>

    <div class="container">
        <div class="card">
        @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
            <img src="images/lbs.jpg" alt="">
            <h1 class="card-title">Connexion</h1>
            <!-- Affichez les messages d'erreur ici si nécessaire -->
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email" class="form-label">Adresse e-mail</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Votre adresse e-mail" required>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Votre mot de passe" required>
                </div>
                <button type="submit" class="btn btn-login">Se connecter</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
         .footer {
            text-align: center;
            color: #777;
            margin-top: -50px;
        }
    </style>
    <style>
        html, body {
  width: 100%;
  height:100%;
}

body {
    background-color: #0078d4;
}

    </style>
</body>
</html>
