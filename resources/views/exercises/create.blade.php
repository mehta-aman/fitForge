@extends('layouts.user')

@section('title', 'Create Exercise')
@section('header', 'Create Exercise')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height:80vh;">
    <div class="card fitforge-glow-card p-4" style="max-width: 420px; width:100%;">
        <form method="POST" action="{{ route('exercises.store') }}" enctype="multipart/form-data">
            @csrf
            <h3 class="mb-4 text-center" style="color:#f9f9f9; font-weight:700;">Create Exercise</h3>
            <div class="text-center mb-3">
                <label for="media_url" style="cursor:pointer;">
                    <div class="fitforge-upload-img mb-2 mx-auto">
                        <i class="fas fa-camera" style="font-size:2rem;color:#6C63FF;"></i>
                    </div>
                    <span style="color:#00C9A7; font-weight:500;">Add Image</span>
                    <input type="file" name="media_url" id="media_url" accept="image/*" style="display:none;">
                </label>
            </div>
            <div class="form-group mb-3">
                <input type="text" name="name" class="form-control fitforge-input" placeholder="Exercise Name" value="{{ old('name') }}" required>
                @error('name')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="form-group mb-3">
                <label class="mb-1" style="color:#bdbdd7;">Exercise Type</label>
                <select name="category" class="form-control fitforge-input" required>
                    <option value="">Select...</option>
                    <option value="Strength" {{ old('category')=='Strength'?'selected':'' }}>Strength</option>
                    <option value="Cardio" {{ old('category')=='Cardio'?'selected':'' }}>Cardio</option>
                    <option value="Mobility" {{ old('category')=='Mobility'?'selected':'' }}>Mobility</option>
                </select>
                @error('category')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="form-group mb-3">
                <label class="mb-1" style="color:#bdbdd7;">Equipment</label>
                <select name="equipment" class="form-control fitforge-input">
                    <option value="">Select...</option>
                    <option value="Barbell" {{ old('equipment')=='Barbell'?'selected':'' }}>Barbell</option>
                    <option value="Dumbbell" {{ old('equipment')=='Dumbbell'?'selected':'' }}>Dumbbell</option>
                    <option value="Bodyweight" {{ old('equipment')=='Bodyweight'?'selected':'' }}>Bodyweight</option>
                    <option value="Machine" {{ old('equipment')=='Machine'?'selected':'' }}>Machine</option>
                    <option value="Cable" {{ old('equipment')=='Cable'?'selected':'' }}>Cable</option>
                    <option value="Other" {{ old('equipment')=='Other'?'selected':'' }}>Other</option>
                </select>
                @error('equipment')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="form-group mb-3">
                <label class="mb-1" style="color:#bdbdd7;">Primary Muscle Group</label>
                <select name="muscle_group" class="form-control fitforge-input" required>
                    <option value="">Select...</option>
                    <option value="Chest" {{ old('muscle_group')=='Chest'?'selected':'' }}>Chest</option>
                    <option value="Back" {{ old('muscle_group')=='Back'?'selected':'' }}>Back</option>
                    <option value="Shoulders" {{ old('muscle_group')=='Shoulders'?'selected':'' }}>Shoulders</option>
                    <option value="Biceps" {{ old('muscle_group')=='Biceps'?'selected':'' }}>Biceps</option>
                    <option value="Triceps" {{ old('muscle_group')=='Triceps'?'selected':'' }}>Triceps</option>
                    <option value="Legs" {{ old('muscle_group')=='Legs'?'selected':'' }}>Legs</option>
                    <option value="Abs" {{ old('muscle_group')=='Abs'?'selected':'' }}>Abs</option>
                    <option value="Other" {{ old('muscle_group')=='Other'?'selected':'' }}>Other</option>
                </select>
                @error('muscle_group')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="form-group mb-3">
                <label class="mb-1" style="color:#bdbdd7;">Difficulty</label>
                <select name="difficulty" class="form-control fitforge-input">
                    <option value="">Select...</option>
                    <option value="easy" {{ old('difficulty')=='easy'?'selected':'' }}>Easy</option>
                    <option value="medium" {{ old('difficulty')=='medium'?'selected':'' }}>Medium</option>
                    <option value="hard" {{ old('difficulty')=='hard'?'selected':'' }}>Hard</option>
                </select>
                @error('difficulty')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="form-group mb-3">
                <label class="mb-1" style="color:#bdbdd7;">Duration (minutes)</label>
                <input type="number" name="duration" class="form-control fitforge-input" placeholder="e.g., 30" value="{{ old('duration') }}" min="0">
                @error('duration')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="form-group mb-4">
                <label class="mb-1" style="color:#bdbdd7;">Description</label>
                <textarea name="description" class="form-control fitforge-input" rows="4" placeholder="Detailed description of the exercise...">{{ old('description') }}</textarea>
                @error('description')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="form-group mb-4">
                <label class="mb-1" style="color:#bdbdd7;">Other Muscles</label>
                <select name="secondary_muscle_group" class="form-control fitforge-input">
                    <option value="">Select...</option>
                    <option value="Muscles" {{ old('secondary_muscle_group')=='Muscles'?'selected':'' }}>Muscles</option>
                    @foreach($muscleGroupOptions as $option)
                        <option value="{{ $option }}" {{ old('secondary_muscle_group')==$option?'selected':'' }}>{{ $option }}</option>
                    @endforeach
                </select>
                @error('secondary_muscle_group')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary rounded-pill px-4 fitforge-btn-block" style="font-weight:600; box-shadow:0 0 8px #6C63FF55;">Save Exercise</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
    .fitforge-upload-img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: #f4f4fa;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 0.5rem;
        border: 2px dashed #bdbdd7;
        transition: border 0.2s;
    }
    .fitforge-upload-img:hover {
        border: 2px solid #6C63FF;
    }
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
