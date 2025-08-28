@extends('layouts.user')

@section('title', 'Edit Measurement')
@section('header', 'Edit Measurement')

@section('content')
@php
function lbsToKg($lbs) { return $lbs !== null ? round($lbs / 2.20462, 2) : null; }
function ftInToCm($ft, $in) { return ($ft !== null && $in !== null) ? round(($ft * 30.48) + ($in * 2.54), 2) : null; }
@endphp
@php $unit = Auth::user()->unit_preference ?? 'metric'; @endphp
<div class="card fitforge-glow-card p-4 mx-auto" style="max-width:600px;">
    <h3 class="mb-4" style="color:#6C63FF; font-weight:800; letter-spacing:1px; text-shadow:0 2px 12px #6C63FF44;">Edit Measurement</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('measurements.update', $measurement) }}" autocomplete="off">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <div class="row g-3">
            <div class="col-12">
                <label class="form-label text-white fw-bold"><i class="fas fa-calendar-alt me-2"></i>Date</label>
                <input type="date" name="date" class="form-control fitforge-input" value="{{ old('date', $measurement->date ?? date('Y-m-d')) }}" required>
            </div>
            <div class="col-6">
                <label class="form-label text-white"><i class="fas fa-weight me-2"></i>Weight @if($unit=='us')(lbs)@else(kg)@endif</label>
                <input type="number" step="0.1" name="weight" class="form-control fitforge-input" value="{{ old('weight', $unit=='us' ? (isset($measurement->weight) ? round($measurement->weight*2.20462,1) : '') : ($measurement->weight ?? '')) }}">
            </div>
            <div class="col-6">
                <label class="form-label text-white"><i class="fas fa-ruler-horizontal me-2"></i>Waist (cm)</label>
                <input type="number" step="0.1" name="waist_circumference" class="form-control fitforge-input" value="{{ old('waist_circumference', $measurement->waist_circumference ?? '') }}">
            </div>
            <div class="col-6">
                <label class="form-label text-white"><i class="fas fa-ruler-combined me-2"></i>Hip (cm)</label>
                <input type="number" step="0.1" name="hip_circumference" class="form-control fitforge-input" value="{{ old('hip_circumference', $measurement->hip_circumference ?? '') }}">
            </div>
            <div class="col-6">
                <label class="form-label text-white"><i class="fas fa-ruler-horizontal me-2"></i>Chest (cm)</label>
                <input type="number" step="0.1" name="chest_circumference" class="form-control fitforge-input" value="{{ old('chest_circumference', $measurement->chest_circumference ?? '') }}">
            </div>
            <div class="col-6">
                <label class="form-label text-white"><i class="fas fa-ruler-horizontal me-2"></i>Shoulder (cm)</label>
                <input type="number" step="0.1" name="shoulder_circumference" class="form-control fitforge-input" value="{{ old('shoulder_circumference', $measurement->shoulder_circumference ?? '') }}">
            </div>
            <div class="col-6">
                <label class="form-label text-white"><i class="fas fa-ruler-horizontal me-2"></i>Thigh (cm)</label>
                <input type="number" step="0.1" name="thigh_circumference" class="form-control fitforge-input" value="{{ old('thigh_circumference', $measurement->thigh_circumference ?? '') }}">
            </div>
            <div class="col-6">
                <label class="form-label text-white"><i class="fas fa-ruler-vertical me-2"></i>Height @if($unit=='us')(ft/in)@else(cm)@endif</label>
                @if($unit=='us')
                    @php
                        $ft = $in = '';
                        if(isset($measurement->height)) {
                            $inches = $measurement->height * 0.393701;
                            $ft = floor($inches / 12);
                            $in = round($inches - ($ft * 12));
                        }
                    @endphp
                    <div class="d-flex align-items-center">
                        <input type="number" name="height_ft" class="form-control fitforge-input me-2" placeholder="ft" min="0" value="{{ old('height_ft', $ft) }}" style="width:60px;">
                        <input type="number" name="height_in" class="form-control fitforge-input" placeholder="in" min="0" max="11" value="{{ old('height_in', $in) }}" style="width:60px;">
                    </div>
                @else
                    <input type="number" step="0.1" name="height" class="form-control fitforge-input" value="{{ old('height', $measurement->height ?? '') }}">
                @endif
            </div>
            <div class="col-6">
                <label class="form-label text-white"><i class="fas fa-heartbeat me-2"></i>Body Fat (%)</label>
                <input type="number" step="0.1" name="body_fat_percentage" class="form-control fitforge-input" value="{{ old('body_fat_percentage', $measurement->body_fat_percentage ?? '') }}">
            </div>
            <div class="col-6">
                <label class="form-label text-white"><i class="fas fa-dumbbell me-2"></i>Muscle Mass (kg)</label>
                <input type="number" step="0.1" name="muscle_mass" class="form-control fitforge-input" value="{{ old('muscle_mass', $measurement->muscle_mass ?? '') }}">
            </div>
        </div>
        <div class="mt-4 text-end">
            <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 shadow fitforge-glow-btn" style="font-size:1.2em;">Update Measurement</button>
        </div>
    </form>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
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
    .fitforge-input {
        background: #23234a !important;
        color: #fff !important;
        border: 1px solid #6C63FF44 !important;
        border-radius: 0.7rem;
        box-shadow: 0 0 8px #6C63FF22;
        font-size: 1em;
    }
    .fitforge-input:focus {
        border-color: #00C9A7 !important;
        box-shadow: 0 0 12px #00C9A7AA;
        color: #fff;
    }
    .fitforge-glow-btn {
        background: linear-gradient(90deg,#00C9A7 0%,#6C63FF 100%) !important;
        border: none !important;
        font-weight: 700;
        transition: box-shadow 0.2s, filter 0.2s;
    }
    .fitforge-glow-btn:hover, .fitforge-glow-btn:focus {
        box-shadow: 0 0 32px 8px #00C9A7AA, 0 0 48px 16px #6C63FF88;
        filter: brightness(1.08);
        outline: none;
    }
</style>
@endpush

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    if(form) {
        form.addEventListener('submit', function(e) {
            const unit = '{{ $unit }}';
            if(unit === 'us') {
                // Convert lbs to kg for weight
                const weightInput = form.querySelector('input[name="weight"]');
                if(weightInput && weightInput.value) {
                    weightInput.value = (parseFloat(weightInput.value) / 2.20462).toFixed(2);
                }
                // Convert ft/in to cm for height
                const ftInput = form.querySelector('input[name="height_ft"]');
                const inInput = form.querySelector('input[name="height_in"]');
                if(ftInput && inInput) {
                    const ft = parseInt(ftInput.value) || 0;
                    const inch = parseInt(inInput.value) || 0;
                    const cm = (ft * 30.48) + (inch * 2.54);
                    let heightInput = form.querySelector('input[name="height"]');
                    if(!heightInput) {
                        heightInput = document.createElement('input');
                        heightInput.type = 'hidden';
                        heightInput.name = 'height';
                        form.appendChild(heightInput);
                    }
                    heightInput.value = cm.toFixed(2);
                    ftInput.disabled = true;
                    inInput.disabled = true;
                }
            }
        });
    }
});
</script>
