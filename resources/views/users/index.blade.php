@extends('layouts.admin')

@section('title', 'Users')
@section('header', 'Users')

@section('content')
<div class="card fitforge-glow-card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0" style="color:#6C63FF;">All Users</h4>
        <a href="{{ route('users.create') }}" class="btn btn-primary rounded-pill px-4" style="font-weight:600; box-shadow:0 0 8px #6C63FF55;">+ Add User</a>
    </div>
    <div class="row g-4">
        @forelse($users as $user)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="fitforge-user-card card h-100 p-3 d-flex flex-column align-items-center text-center">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=6C63FF&color=fff&size=96" alt="Avatar" class="rounded-circle mb-3" style="width:72px;height:72px;object-fit:cover;box-shadow:0 0 8px #6C63FF55;">
                    <h5 class="mb-1" style="color:#f9f9f9;font-weight:600;">{{ $user->name }}</h5>
                    <div class="mb-1" style="color:#00C9A7;font-size:0.98rem;">{{ $user->email }}</div>
                    <span class="badge bg-gradient-primary mb-2" style="background:linear-gradient(90deg,#6C63FF 60%,#00C9A7 100%);color:#fff;font-weight:600;border-radius:1rem;padding:0.3em 0.9em;">{{ ucfirst($user->role) }}</span>
                    <a href="{{ route('users.show', $user) }}" class="btn btn-outline-primary rounded-pill mt-auto px-3" style="font-weight:500; box-shadow:0 0 6px #6C63FF33;">View</a>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted py-4">No users found.</div>
        @endforelse
    </div>
    <div class="mt-4">
        {{ $users->links() }}
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
.fitforge-user-card {
    background: rgba(30, 30, 55, 0.98) !important;
    border: none;
    border-radius: 1.1rem;
    box-shadow: 0 0 16px 0 #6C63FF33, 0 2px 8px 0 #00C9A733;
    transition: box-shadow 0.2s, transform 0.2s;
    min-height: 260px;
}
.fitforge-user-card:hover {
    box-shadow: 0 0 18px 4px #6C63FF, 0 2px 16px 0 #00C9A7;
    transform: translateY(-2px) scale(1.03);
}
.btn-outline-primary {
    border-color: #6C63FF;
    color: #6C63FF;
    background: transparent;
}
.btn-outline-primary:hover {
    background: #6C63FF;
    color: #fff;
    box-shadow: 0 0 8px #6C63FF55;
}
@media (max-width: 600px) {
    .fitforge-glow-card {
        padding: 1rem !important;
    }
    .fitforge-user-card {
        min-height: 200px;
        padding: 1.1rem !important;
    }
    .fitforge-user-card h5 {
        font-size: 1.05rem;
    }
}
</style>
@endpush
