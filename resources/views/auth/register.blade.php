<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Cosmétiques Marocains</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <div class="register-container">
        <div class="register-logo">
            <img src="/api/placeholder/200/100" alt="Logo Cosmétiques Marocains">
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-row">
               
                <div class="form-group">
                    <label for="nom">name</label>
                    <input type="text" id="nom" name="name" value="{{ old('name') }}" required placeholder="Votre name">
                </div>
            </div>
            <div class="form-group">
                <label for="email">Adresse Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="Votre adresse email">
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="password">Mot de Passe</label>
                    <input type="password" id="password" name="password" required placeholder="Créez un mot de passe">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmer le Mot de Passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Confirmez votre mot de passe">
                </div>
            </div>
            <div class="terms-section">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">J'accepte les conditions d'utilisation</label>
            </div>
            <button type="submit" class="register-btn">Créer un Compte</button>
            <div class="login-link">
                Vous avez déjà un compte ? <a href="{{ route('login') }}">Connectez-vous</a>
            </div>
            <div class="social-login">
                <a href="#" class="social-btn gmail">
                    <i class="fab fa-google"></i>Gmail
                </a>
                <a href="#" class="social-btn facebook">
                    <i class="fab fa-facebook-f"></i>Facebook
                </a>
            </div>
        </form>
    </div>
</body>
</html>
