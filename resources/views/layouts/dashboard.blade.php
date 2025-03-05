
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
        @include('layouts.sidebar')

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
