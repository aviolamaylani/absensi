<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Absensi</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="/assets/fontawesome/css/all.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-base-100">

        @if (Auth::user()->hasRole('admin'))
            @include('layouts.navbar')
        @endif

        <!-- Page Heading -->
        <div class="px-80 w-full">
            @yield('content')
        </div>

        <!-- Page Content -->
        <main>

        </main>
    </div>
</body>

</html>
