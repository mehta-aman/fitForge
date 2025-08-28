@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-white">{{ $exercise->name }}</h1>
        <a href="{{ route('exercises.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Back to Exercises
        </a>
    </div>

    <div class="bg-gray-800 shadow-lg rounded-lg p-6 mb-8 flex flex-wrap lg:flex-nowrap items-center">
        @if($exercise->media_url)
            <div class="lg:w-1/3 w-full mb-6 lg:mb-0 lg:mr-8 flex justify-center items-center">
                <img src="{{ asset($exercise->media_url) }}" alt="{{ $exercise->name }}" class="rounded-lg max-w-full h-auto object-contain" style="max-height: 400px;">
            </div>
        @endif
        <div class="lg:w-2/3 w-full text-white">
            <h2 class="text-2xl font-semibold mb-4">{{ $exercise->name }} @if($exercise->category) ({{ $exercise->category }}) @endif</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <p class="text-gray-400"><strong class="text-white">Equipment:</strong> {{ $exercise->equipment ?? 'N/A' }}</p>
                <p class="text-gray-400"><strong class="text-white">Primary Muscle Group:</strong> {{ $exercise->muscle_group ?? 'N/A' }}</p>
                <p class="text-gray-400"><strong class="text-white">Secondary Muscle Group:</strong> {{ $exercise->secondary_muscle_group ?? 'N/A' }}</p>
                <p class="text-gray-400"><strong class="text-white">Difficulty:</strong> {{ ucfirst($exercise->difficulty) ?? 'N/A' }}</p>
                <p class="text-gray-400"><strong class="text-white">Duration:</strong> {{ $exercise->duration ? $exercise->duration . ' minutes' : 'N/A' }}</p>
            </div>
            @if($exercise->description)
                <div class="mt-4">
                    <p class="text-gray-400"><strong class="text-white">Description:</strong></p>
                    <p class="text-gray-400">{{ $exercise->description }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
