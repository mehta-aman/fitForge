@extends('layouts.admin')

@section('title', 'Create User')
@section('header', 'Create User')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height:80vh;">
    <div class="card fitforge-glow-card p-4" style="max-width: 600px; width:100%;">
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <h3 class="mb-4 text-center" style="color:#f9f9f9; font-weight:700;">Create New User</h3>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="mb-1" style="color:#bdbdd7;">Name</label>
                        <input type="text" name="name" class="form-control fitforge-input" value="{{ old('name') }}" required>
                        @error('name')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="mb-1" style="color:#bdbdd7;">Email</label>
                        <input type="email" name="email" class="form-control fitforge-input" value="{{ old('email') }}" required>
                        @error('email')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="mb-1" style="color:#bdbdd7;">Password</label>
                        <input type="password" name="password" class="form-control fitforge-input" required autocomplete="new-password">
                        @error('password')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="mb-1" style="color:#bdbdd7;">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control fitforge-input" required autocomplete="new-password">
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="mb-1" style="color:#bdbdd7;">Role</label>
                        <select name="role" class="form-control fitforge-input" required>
                            <option value="user" {{ old('role')=='user'?'selected':'' }}>User</option>
                            <option value="admin" {{ old('role')=='admin'?'selected':'' }}>Admin</option>
                        </select>
                        @error('role')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="mb-1" style="color:#bdbdd7;">Age</label>
                        <input type="number" name="age" class="form-control fitforge-input" value="{{ old('age') }}">
                        @error('age')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="mb-1" style="color:#bdbdd7;">Gender</label>
                        <select name="gender" class="form-control fitforge-input">
                            <option value="">Select...</option>
                            <option value="male" {{ old('gender')=='male'?'selected':'' }}>Male</option>
                            <option value="female" {{ old('gender')=='female'?'selected':'' }}>Female</option>
                            <option value="other" {{ old('gender')=='other'?'selected':'' }}>Other</option>
                        </select>
                        @error('gender')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="mb-1" style="color:#bdbdd7;">Height (cm)</label>
                        <input type="number" step="0.01" name="height" class="form-control fitforge-input" value="{{ old('height') }}">
                        @error('height')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="mb-1" style="color:#bdbdd7;">Weight (kg)</label>
                        <input type="number" step="0.01" name="weight" class="form-control fitforge-input" value="{{ old('weight') }}">
                        @error('weight')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="mb-1" style="color:#bdbdd7;">Activity Level</label>
                        <select name="activity_level" class="form-control fitforge-input">
                            <option value="">Select...</option>
                            <option value="sedentary" {{ old('activity_level')=='sedentary'?'selected':'' }}>Sedentary (little or no exercise)</option>
                            <option value="lightly_active" {{ old('activity_level')=='lightly_active'?'selected':'' }}>Lightly active (light exercise/sports 1-3 days/week)</option>
                            <option value="moderately_active" {{ old('activity_level')=='moderately_active'?'selected':'' }}>Moderately active (moderate exercise/sports 3-5 days/week)</option>
                            <option value="very_active" {{ old('activity_level')=='very_active'?'selected':'' }}>Very active (hard exercise/sports 6-7 days/week)</option>
                            <option value="extra_active" {{ old('activity_level')=='extra_active'?'selected':'' }}>Extra active (very hard exercise/physical job)</option>
                        </select>
                        @error('activity_level')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="mb-1" style="color:#bdbdd7;">Health Conditions</label>
                <select name="health_conditions[]" class="form-control fitforge-input" multiple>
                    <option value="">Select (Optional)</option>
                    <option value="none" {{ in_array('none', old('health_conditions', [])) ? 'selected' : '' }}>None</option>
                    <option value="diabetes" {{ in_array('diabetes', old('health_conditions', [])) ? 'selected' : '' }}>Diabetes</option>
                    <option value="heart_disease" {{ in_array('heart_disease', old('health_conditions', [])) ? 'selected' : '' }}>Heart Disease</option>
                    <option value="hypertension" {{ in_array('hypertension', old('health_conditions', [])) ? 'selected' : '' }}>Hypertension</option>
                    <option value="asthma" {{ in_array('asthma', old('health_conditions', [])) ? 'selected' : '' }}>Asthma</option>
                    <option value="joint_pain" {{ in_array('joint_pain', old('health_conditions', [])) ? 'selected' : '' }}>Joint Pain</option>
                    <option value="back_pain" {{ in_array('back_pain', old('health_conditions', [])) ? 'selected' : '' }}>Back Pain</option>
                    <option value="allergies" {{ in_array('allergies', old('health_conditions', [])) ? 'selected' : '' }}>Allergies</option>
                </select>
                @error('health_conditions')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="form-group mb-3">
                <label class="mb-1" style="color:#bdbdd7;">Goals</label>
                <select name="goals[]" class="form-control fitforge-input" multiple>
                    <option value="">Select (Optional)</option>
                    <option value="weight_loss" {{ in_array('weight_loss', old('goals', [])) ? 'selected' : '' }}>Weight Loss</option>
                    <option value="muscle_gain" {{ in_array('muscle_gain', old('goals', [])) ? 'selected' : '' }}>Muscle Gain</option>
                    <option value="improve_cardio" {{ in_array('improve_cardio', old('goals', [])) ? 'selected' : '' }}>Improve Cardiovascular Health</option>
                    <option value="increase_strength" {{ in_array('increase_strength', old('goals', [])) ? 'selected' : '' }}>Increase Strength</option>
                    <option value="flexibility" {{ in_array('flexibility', old('goals', [])) ? 'selected' : '' }}>Improve Flexibility</option>
                    <option value="endurance" {{ in_array('endurance', old('goals', [])) ? 'selected' : '' }}>Build Endurance</option>
                    <option value="overall_fitness" {{ in_array('overall_fitness', old('goals', [])) ? 'selected' : '' }}>Overall Fitness</option>
                    <option value="stress_reduction" {{ in_array('stress_reduction', old('goals', [])) ? 'selected' : '' }}>Stress Reduction</option>
                </select>
                @error('goals')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            {{-- New fields from the image --}}
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="mb-1" style="color:#bdbdd7;">Mobile Phone</label>
                        <input type="text" name="phone" class="form-control fitforge-input" value="{{ old('phone') }}">
                        @error('phone')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="mb-1" style="color:#bdbdd7;">Birthdate</label>
                        <input type="date" name="birthdate" class="form-control fitforge-input" value="{{ old('birthdate') }}">
                        @error('birthdate')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="mb-1" style="color:#bdbdd7;">Username</label>
                        <input type="text" name="username" class="form-control fitforge-input" value="{{ old('username') }}">
                        @error('username')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="mb-1" style="color:#bdbdd7;">Preferred Language</label>
                        <input type="text" name="preferred_language" class="form-control fitforge-input" value="{{ old('preferred_language') }}">
                        @error('preferred_language')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 mt-3" style="font-weight:600; box-shadow:0 0 12px #6C63FF88;">Create User</button>
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
    background: rgba(40, 40, 70, 0.7) !important;
    border: 1px solid #6C63FF;
    color: #f9f9f9 !important;
    border-radius: 0.75rem;
    /* padding: 0.75rem 1rem; */
    transition: all 0.3s ease;
}
.fitforge-input:focus {
    background: rgba(50, 50, 80, 0.9) !important;
    border-color: #00C9A7;
    box-shadow: 0 0 10px rgba(0,201,167,0.3);
}
.fitforge-input::placeholder {
    color: #bdbdd7;
}
</style>
@endpush
