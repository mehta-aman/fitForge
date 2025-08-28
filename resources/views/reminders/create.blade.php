@extends('layouts.user')

@section('title', 'Add Reminder')
@section('header', 'Add Reminder')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card fitforge-glow-card p-4">
            <h4 class="mb-4" style="color:#6C63FF;">Create New Reminder</h4>
            <form method="POST" action="{{ route('reminders.store') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="user_id" style="color:#fff;">User</label>
                    <select name="user_id" id="user_id" class="form-control rounded-pill fitforge-input" required>
                        <option value="">Select User</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <label for="title" style="color:#fff;">Title</label>
                    <input type="text" name="title" id="title" class="form-control rounded-pill fitforge-input" value="{{ old('title') }}" required>
                    @error('title')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <label for="description" style="color:#fff;">Description</label>
                    <textarea name="description" id="description" class="form-control rounded-pill fitforge-input" rows="2">{{ old('description') }}</textarea>
                    @error('description')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label for="reminder_time" style="color:#fff;">Reminder Time</label>
                    <input type="datetime-local" name="reminder_time" id="reminder_time" class="form-control rounded-pill fitforge-input" value="{{ old('reminder_time') }}" required>
                    @error('reminder_time')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary rounded-pill px-4 fitforge-btn-block" style="font-weight:600; box-shadow:0 0 8px #6C63FF55;">Create Reminder</button>
                </div>
            </form>
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
    @media (max-width: 600px) {
        .fitforge-glow-card {
            padding: 1rem !important;
        }
        .fitforge-btn-block {
            width: 100%;
        }
    }
</style>
@endpush
