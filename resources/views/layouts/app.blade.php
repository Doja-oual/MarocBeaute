<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon Application')</title>

    <!-- Tailwind CSS / Bootstrap -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('styles')
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-500 p-4 text-white flex justify-between">
        <div class="text-lg font-bold">Mon Application</div>
        <div>
            <a href="{{ route('dashboard') }}" class="mr-4">Accueil</a>
            <a href="{{ route('orders.index') }}">Commandes</a>
        </div>
    </nav>

    <div class="container mx-auto mt-8 p-4">
        @yield('content')
    </div>

    @stack('scripts')

</body>
</html>
