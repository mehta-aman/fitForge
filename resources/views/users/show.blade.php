@extends('layouts.admin')

@section('title', 'User Profile')
@section('header', 'User Profile')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card fitforge-glow-card p-4 mb-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="user-avatar me-4">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=6C63FF&color=fff&size=128" alt="Avatar" class="rounded-circle" style="width:96px;height:96px;object-fit:cover;box-shadow:0 0 16px #6C63FF55;">
                    </div>
                    <div class="flex-grow-1">
                        <h3 class="mb-1" style="color:#f9f9f9;font-weight:700;">{{ $user->name }}</h3>
                        <div class="mb-2" style="color:#00C9A7;font-size:1.1rem;">{{ $user->email }}</div>
                        <span class="badge bg-gradient-primary" style="background:linear-gradient(90deg,#6C63FF 60%,#00C9A7 100%);color:#fff;font-weight:600;border-radius:1rem;padding:0.4em 1em;">{{ ucfirst($user->role) }}</span>
                    </div>
                    <div>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-primary rounded-pill px-4 ms-3" style="font-weight:600; box-shadow:0 0 8px #6C63FF55;">Edit User</a>
                    </div>
                </div>
                <div class="row g-3 mb-2">
                    <div class="col-md-6">
                        <div class="fitforge-profile-label">Mobile Phone</div>
                        <div class="fitforge-profile-value">{{ $user->phone ?? '-' }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="fitforge-profile-label">Birthdate</div>
                        <div class="fitforge-profile-value">{{ $user->birthdate ?? '-' }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="fitforge-profile-label">Username</div>
                        <div class="fitforge-profile-value">{{ $user->username ?? '-' }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="fitforge-profile-label">Preferred Language</div>
                        <div class="fitforge-profile-value">{{ $user->preferred_language ?? '-' }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="fitforge-profile-label">Created</div>
                        <div class="fitforge-profile-value">{{ $user->created_at->format('m/d/Y h:i A') }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="fitforge-profile-label">Last Login</div>
                        <div class="fitforge-profile-value">{{ $user->last_login_at ?? '-' }}</div>
                    </div>
                </div>
                <hr style="border-color:#23234a;">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="fitforge-profile-label">Age</div>
                        <div class="fitforge-profile-value">{{ $user->age ?? '-' }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="fitforge-profile-label">Gender</div>
                        <div class="fitforge-profile-value">{{ ucfirst($user->gender) ?? '-' }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="fitforge-profile-label">Goals</div>
                        <div class="fitforge-profile-value">{{ $user->goals ?? '-' }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="fitforge-profile-label">Height</div>
                        <div class="fitforge-profile-value">{{ $user->height ? $user->height.' cm' : '-' }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="fitforge-profile-label">Weight</div>
                        <div class="fitforge-profile-value">{{ $user->weight ? $user->weight.' kg' : '-' }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="fitforge-profile-label">Activity Level</div>
                        <div class="fitforge-profile-value">{{ $user->activity_level ?? '-' }}</div>
                    </div>
                    <div class="col-md-12">
                        <div class="fitforge-profile-label">Health Conditions</div>
                        <div class="fitforge-profile-value">{{ $user->health_conditions ?? '-' }}</div>
                    </div>
                </div>
            </div>
            <!-- Tabs for activity/history can be added here -->
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.fitforge-glow-card {
    background: rgba(20, 20, 40, 0.97) !important;
    border: none;
    border-radius: 1.2rem;
    box-shadow: 0 0 32px 0 rgba(108,99,255,0.18), 0 2px 16px 0 rgba(0,201,167,0.10);
    margin-bottom: 2rem;
    transition: box-shadow 0.3s;
}
.fitforge-glow-card:hover {
    box-shadow: 0 0 25px 8px #6C63FF, 0 2px 24px 0 #00C9A7;
}
.user-avatar img {
    border: 3px solid #6C63FF;
    background: #fff;
}
.fitforge-profile-label {
    color: #bdbdd7;
    font-size: 0.98em;
    font-weight: 600;
    margin-bottom: 0.2em;
}
.fitforge-profile-value {
    color: #f9f9f9;
    font-size: 1.08em;
    font-weight: 500;
    margin-bottom: 0.7em;
}
</style>
@endpush
