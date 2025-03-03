
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('storage/css/dashboard.css') }}">
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <div class="logo">
                <h1>MOROCCAN<br>COSMETICS</h1>
            </div>
            <ul class="nav-menu">
                <li class="nav-item active"><i>📊</i> <a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                <li class="nav-item"><i>📦</i> <a href="">Produits</a></li>
                <li class="nav-item"><i>🛒</i> <a href="">Commandes</a></li>
                <li class="nav-item"><i>👥</i> <a href="">Clients</a></li>
                <li class="nav-item"><i>👨‍🎨</i> <a href="">Artisans</a></li>
                <li class="nav-item"><i>📝</i> <a href="">Blog</a></li>
                <li class="nav-item"><i>⚙️</i> <a href="">Paramètres</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <div class="header">
                <h2>@yield('title')</h2>
                <div class="user-info">
                    <img src="{{ asset('images/admin.png') }}" alt="Admin"/>
                    <span>Admin</span>
                </div>
            </div>

            @yield('content')

        </main>
    </div>
</body>
</html>
