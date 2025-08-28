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

    {{--Favicon --}}
    <link rel="icon" href="/images/icons/favicon.png" type="image/png">
    {{-- <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/favicon_ico/apple-touch-icon.png') }}"> --}}
{{-- <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/favicon_ico/favicon-32x32.png') }}"> --}}
{{-- <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/favicon_ico/favicon-16x16.png') }}"> --}}
{{-- <link rel="manifest" href="{{ asset('favicon_ico/site.webmanifest') }}"> --}}


    {{-- Fonts --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-[var(--color-bg)] text-[var(--color-dark)] font-sans min-h-screen flex flex-col">

    {{-- Header --}}
    @include('layouts.header')

    {{-- Main Content --}}
    <main class="flex-grow">
        @include('layouts.hero')
        @include('layouts.features')
        @include('layouts.progress-tracker')
        @include('layouts.testimonials')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

</body>
</html>


