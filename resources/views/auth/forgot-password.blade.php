<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié - Cosmétiques Marocains</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"> <!-- Réutilise le CSS existant -->
</head>
<body>
    <div class="login-container">
        <div class="login-logo">
            <img src="https://via.placeholder.com/200x100?text=Cosmétiques+Marocains" alt="Logo Cosmétiques Marocains">
        </div>
        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
        <form method="POST" action="{{ route('password.forgot') }}">
            @csrf
            <div class="form-group">
                <label for="email">Adresse Email</label>
                <input type="email" id="email" name="email" required placeholder="Entrez votre email" value="{{ old('email') }}">
            </div>
            <button type="submit" class="login-btn">Envoyer le lien de réinitialisation</button>
            <div class="register-link">
                Retourner à la <a href="{{ route('login') }}">connexion</a>
            </div>
        </form>
    </div>
</body>
</html>