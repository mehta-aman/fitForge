@extends('layouts.admin')

@section('title', 'Admin Settings')
@section('header', 'Admin Settings')

@section('content')
<div class="card fitforge-glow-card p-5 text-center">
    <h2 style="color:#6C63FF;">Admin Settings</h2>
    <p class="text-muted">This is a placeholder for admin settings. Add your settings here.</p>
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
</style>
@endpush 