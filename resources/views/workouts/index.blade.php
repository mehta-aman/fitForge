@extends('layouts.user')

@section('title', 'Workouts')
@section('header', 'Workouts')

@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="card fitforge-glow-card p-4 mb-4">
            <h4 class="mb-3" style="color:#6C63FF;">My Routines</h4>
            <a href="{{ route('workouts.create') }}" class="btn btn-primary rounded-pill px-4" style="font-weight:600; box-shadow:0 0 8px #6C63FF55;"> <i class="fas fa-plus-circle me-2"></i>New Routine</a>
            
            {{-- List of routines will go here --}}
            @if($workouts->count() > 0)
                <ul class="list-group list-group-flush mt-3">
                    @foreach($workouts as $workout)
                        <li class="list-group-item bg-transparent text-light fitforge-input mb-2 d-flex justify-content-between align-items-center">
                            <span>{{ $workout->title }}</span>
                            <a href="{{ route('workouts.show', $workout) }}" class="btn btn-sm btn-outline-info rounded-pill">View</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="mt-4 text-center text-muted">
                    <p>No routines created yet.</p>
                </div>
            @endif
        </div>
    </div>
    <div class="col-md-7">
        <div class="card fitforge-glow-card p-4 text-center d-flex flex-column justify-content-center align-items-center" style="min-height:300px;">
            <i class="fas fa-clipboard-list" style="font-size:4rem; color:#00C9A7; margin-bottom:1rem;"></i>
            <h4 style="color:#f9f9f9; font-weight:700;">Get started</h4>
            <p class="text-muted">Start by creating a routine!</p>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .fitforge-glow-card {
        background: rgba(20, 20, 40, 0.95) !important;
        border: none;
        border-radius: 1.2rem;
        box-shadow: 0 0 32px 0 rgba(108,99,255,0.18), 0 2px 16px 0 rgba(0,201,167,0.10);
        margin-bottom: 2rem;
        transition: box-shadow 0.3s;
    }
    .fitforge-glow-card:hover {
        box-shadow: 0 0 25px 8px #6C63FF, 0 2px 24px 0 #00C9A7;
    }
    .btn-primary {
        background: linear-gradient(90deg, #6C63FF 60%, #00C9A7 100%) !important;
        border: none !important;
        border-radius: 2rem !important;
        font-weight: 600;
        box-shadow: 0 0 8px #6C63FF55 !important;
    }
    .btn-primary:hover {
        background: linear-gradient(90deg, #00C9A7 0%, #6C63FF 100%) !important;
        box-shadow: 0 0 16px #00C9A7 !important;
    }
    .list-group-item {
        border: 1px solid rgba(108, 99, 255, 0.5) !important;
        border-radius: 0.75rem !important;
        margin-bottom: 0.5rem;
    }
    .list-group-item:hover {
        background: rgba(108, 99, 255, 0.1) !important;
        box-shadow: 0 0 10px rgba(108, 99, 255, 0.3);
    }
    .btn-outline-info {
        border-color: #00C9A7;
        color: #00C9A7;
    }
    .btn-outline-info:hover {
        background-color: #00C9A7;
        color: #fff;
    }
</style>
@endpush
