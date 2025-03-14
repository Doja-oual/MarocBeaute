<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialiser le mot de passe - Cosmétiques Marocains</title>
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
        <form method="POST" action="{{ route('password.reset') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">
            <div class="form-group">
                <label for="password">Nouveau Mot de Passe</label>
                <input type="password" id="password" name="password" required placeholder="Entrez votre nouveau mot de passe">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmer le Mot de Passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Confirmez votre nouveau mot de passe">
            </div>
            <button type="submit" class="login-btn">Réinitialiser le mot de passe</button>
            <div class="register-link">
                Retourner à la <a href="{{ route('login') }}">connexion</a>
            </div>
        </form>
    </div>
</body>
</html>