<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'FitForge - Your Fitness Journey')</title>
    <meta name="description" content="@yield('description', 'Track workouts, analyze progress, and achieve your goals with FitForge.')">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-[var(--color-bg)] text-[var(--color-dark)] font-sans min-h-screen flex flex-col">

    {{-- Header --}}
    @include('layouts.header')

    {{-- Main Content --}}
    <main class="flex-grow">
        @include('layouts.hero')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

</body>
</html>


