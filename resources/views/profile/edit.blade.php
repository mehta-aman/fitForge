@extends('layouts.admin')

@section('title', 'Edit Profile')
@section('header', 'Edit Profile')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card mb-4 profile-glow-card">
            <div class="card-header profile-glow-header" style="background: #6C63FF; color: #fff;">
                <h5 class="mb-0">Update Profile Information</h5>
            </div>
            <div class="card-body">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>
        <div class="card mb-4 profile-glow-card">
            <div class="card-header profile-glow-header" style="background: #00C9A7; color: #fff;">
                <h5 class="mb-0">Update Password</h5>
            </div>
            <div class="card-body">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
        <div class="card mb-4 profile-glow-card">
            <div class="card-header profile-glow-header-danger" style="background: red; color: #fff;">
                <h5 class="mb-0">Delete Account</h5>
            </div>
            <div class="card-body">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    body, .content-wrapper {
        background: #0e0e1b !important;
        color: #fff !important;
    }
    .profile-glow-card {
        background: rgba(20, 20, 40, 0.95) !important;
        border: none;
        border-radius: 1.2rem;
        box-shadow: 0 0 32px 0 rgba(108,99,255,0.25), 0 2px 16px 0 rgba(0,201,167,0.10);
        margin-bottom: 2rem;
        transition: box-shadow 0.3s;
    }
    /* .profile-glow-card:hover {
        box-shadow: 0 0 20px 1px #6C63FF, 0 2px 20px 0 #00C9A7;
    } */
    .profile-glow-header {
        font-weight: bold;
        letter-spacing: 1px;
        border-top-left-radius: 1.2rem;
        border-top-right-radius: 1.2rem;
        box-shadow: 0 0 16px 0 #6C63FF99;
        text-shadow: 0 0 8px #6C63FF, 0 0 2px #fff;
    }
    .profile-glow-header-danger {
        font-weight: bold;
        letter-spacing: 1px;
        border-top-left-radius: 1.2rem;
        border-top-right-radius: 1.2rem;
        box-shadow: 0 0 8px 0 #ff4b5c;
        text-shadow: 0 0 8px #ff4b5c, 0 0 2px #fff;
    }
    .card-body {
        background: transparent !important;
    }
    label, .form-label, .form-group label {
        color: #fff !important;
        font-weight: 500;
    }
    input.form-control, select.form-control, textarea.form-control {
        background: #18182a !important;
        color: #fff !important;
        border: 1px solid #2d2d44;
        border-radius: 0.5rem;
        box-shadow: 0 0 8px 0 #6C63FF33;
        transition: border 0.2s, box-shadow 0.2s;
    }
    input.form-control:focus, select.form-control:focus, textarea.form-control:focus {
        border: 1.5px solid #6C63FF;
        box-shadow: 0 0 16px 0 #6C63FF66;
    }
    .btn-primary, .btn-danger, .btn-success {
        border-radius: 0.5rem;
        font-weight: 600;
        box-shadow: 0 0 8px 0 #6C63FF33;
        transition: background 0.2s, box-shadow 0.2s;
    }
    .btn-primary {
        background: linear-gradient(90deg, #6C63FF 60%, #00C9A7 100%);
        border: none;
        transition: background 0.2s, box-shadow 0.2s;
    }
    .btn-primary:hover {
        background: linear-gradient(90deg, #00C9A7 0%, #6C63FF 100%);
        box-shadow: 0 0 10px 0 #00C9A7;
    }
    .btn-danger {
        background: #ff4b5c;
        border: none;
    }
    .btn-danger:hover {
        background: #ff1e38;
        box-shadow: 0 0 10px 0 #ff4b5c;
    }
    .btn-success {
        background: #00C9A7;
        border: none;
        transition: background 0.2s, box-shadow 0.2s;
    }
    .btn-success:hover {
        background: #6C63FF;
        box-shadow: 0 0 16px 0 #00C9A7;
    }
    .form-control::placeholder {
        color: #bdbdd7 !important;
        opacity: 1;
    }
    .max-w-xl {
        max-width: 600px;
        margin: 0 auto;
    }
</style>
@endpush
