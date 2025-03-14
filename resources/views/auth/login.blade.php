<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Cosmetiques Marocains</title>
    <link rel="stylesheet" href="{{ asset('css/login.css')}}"
    
</head>
<body>
    <div class="login-container">
        <div class="login-logo">
            <img src=" alt="Logo Cosmétiques Marocains">
        </div>
        @if(session('success'))
        <div class="success">{{ session('success')}}</div>
        @endif
        @if($errors->any()) 
        <div class="error">
            @foreach($errors->all() as $error)
            {{$error}}<br>
            @endforeach
        </div>
        @endif
        
        <form method="POST" action="{{ route('login')}}">
            @csrf
            <div class="form-group">
                <label for="email">Adresse Email</label>
                <input type="email" id="email" name="email" required placeholder="Entrez votre email">
            </div>
            <div class="form-group">
                <label for="password">Mot de Passe</label>
                <input type="password" id="password" name="password" required placeholder="Entrez votre mot de passe">
            </div>
            <div class="password-forgot">
                <a href="#">Mot de passe oublié ?</a>
            </div>
            <button type="submit" class="login-btn">Se Connecter</button>
            <div class="register-link">
                Pas encore de compte ? <a href="register.html">Inscrivez-vous</a>
            </div>
            <div class="social-login">
                <a href="#" class="social-btn gmail">
                    <i class="fab fa-google"></i>Gmail
                </a>
                <a href="#" class="social-btn facebook">
                    <i class="fab fa-facebook-f"></i>Facebook
                </a>
                <a href="#" class="social-btn instagram">
                    <i class="fab fa-instagram"></i>Instagram
                </a>
            </div>
        </form>
    </div>
</body>
</html>