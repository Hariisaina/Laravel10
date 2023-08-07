<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Authentification</title>
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #337ab7;
        }

        hr {
            border: 0;
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .btn-primary {
            background-color: #337ab7;
            border: none;
            color: #fff;
            padding: 10px;
            border-radius: 3px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #23527c;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md col-md-offset-4" style="margin-top:20px">
                <h1>Se connecter</h1>
                <hr>
                <form action="{{ Route('dashboard') }}" method="POST">
                    @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
                    @csrf
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" placeholder="Entrer votre email" name="email" value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>

                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" placeholder="Entrez le mot de passe" name="password" value="">
                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Connexion </button>
                    </div>
                    <br>
                    <a href="registration">Nouvel utilisateur !! Inscrivez-vous ici</a>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>
