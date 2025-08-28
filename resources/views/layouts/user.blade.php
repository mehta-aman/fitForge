@extends('layouts.admin')

@section('sidebar-menu')
    <li class="nav-item">
        <a href="{{ route('workouts.index') }}" class="nav-link {{ request()->routeIs('workouts.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-dumbbell"></i>
            <p>Workouts</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('exercises.index') }}" class="nav-link {{ request()->routeIs('exercises.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-running"></i>
            <p>Exercises</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('body-condition.index') }}" class="nav-link {{ request()->routeIs('body-condition.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-heartbeat"></i>
            <p>Body Condition</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('progress_logs.index') }}" class="nav-link {{ request()->routeIs('progress-logs.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>Progress Logs</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('measurements.index') }}" class="nav-link {{ request()->routeIs('measurements.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-ruler"></i>
            <p>Measurements</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('goals.index') }}" class="nav-link {{ request()->routeIs('goals.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-bullseye"></i>
            <p>Goals</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('reminders.index') }}" class="nav-link {{ request()->routeIs('reminders.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-bell"></i>
            <p>Reminders</p>
        </a>
    </li>
@endsection 