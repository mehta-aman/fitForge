@extends('layouts.user')

@section('title', 'Update Body Condition')
@section('header', 'Update Body Condition')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height:80vh;">
    <div class="card fitforge-glow-card p-4" style="max-width: 420px; width:100%;">
        <form method="POST" action="{{ route('body-condition.store') }}">
            @csrf
            <h3 class="mb-4 text-center" style="color:#f9f9f9; font-weight:700;">Update Your Measurements</h3>

            <div class="form-group mb-3">
                <label class="mb-1" style="color:#bdbdd7;">Weight (kg)</label>
                <input type="number" step="0.1" name="weight" class="form-control fitforge-input" value="{{ old('weight', $latestMeasurement->weight ?? '') }}" required>
                @error('weight')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="form-group mb-3">
                <label class="mb-1" style="color:#bdbdd7;">Height (cm)</label>
                <input type="number" step="0.1" name="height" class="form-control fitforge-input" value="{{ old('height', $latestMeasurement->height ?? '') }}" required>
                @error('height')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="form-group mb-3">
                <label class="mb-1" style="color:#bdbdd7;">Body Fat (%)</label>
                <input type="number" step="0.1" name="body_fat_percentage" class="form-control fitforge-input" value="{{ old('body_fat_percentage', $latestMeasurement->body_fat_percentage ?? '') }}">
                @error('body_fat_percentage')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="form-group mb-3">
                <label class="mb-1" style="color:#bdbdd7;">Muscle Mass (kg)</label>
                <input type="number" step="0.1" name="muscle_mass" class="form-control fitforge-input" value="{{ old('muscle_mass', $latestMeasurement->muscle_mass ?? '') }}">
                @error('muscle_mass')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="form-group mb-3">
                <label class="mb-1" style="color:#bdbdd7;">Chest (cm)</label>
                <input type="number" step="0.1" name="chest" class="form-control fitforge-input" value="{{ old('chest', $latestMeasurement->chest ?? '') }}">
                @error('chest')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="form-group mb-3">
                <label class="mb-1" style="color:#bdbdd7;">Waist (cm)</label>
                <input type="number" step="0.1" name="waist" class="form-control fitforge-input" value="{{ old('waist', $latestMeasurement->waist ?? '') }}">
                @error('waist')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="form-group mb-4">
                <label class="mb-1" style="color:#bdbdd7;">Hips (cm)</label>
                <input type="number" step="0.1" name="hips" class="form-control fitforge-input" value="{{ old('hips', $latestMeasurement->hips ?? '') }}">
                @error('hips')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary rounded-pill px-4 fitforge-btn-block" style="font-weight:600; box-shadow:0 0 8px #6C63FF55;">Save Measurements</button>
            </div>
        </form>
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
    .fitforge-input {
        background: #23234a !important;
        color: #fff !important;
        border-radius: 2rem !important;
        border: none !important;
        box-shadow: 0 0 8px #6C63FF33 !important;
    }
    .fitforge-input:focus {
        border: 1.5px solid #6C63FF !important;
        box-shadow: 0 0 16px #6C63FF66 !important;
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
</style>
@endpush 