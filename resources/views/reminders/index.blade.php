@extends('layouts.user')

@section('title', 'Reminders')
@section('header', 'Reminders')

@section('content')
<div class="card fitforge-glow-card p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0" style="color:#6C63FF;">All Reminders</h4>
        <a href="{{ route('reminders.create') }}" class="btn btn-primary rounded-pill px-4" style="font-weight:600; box-shadow:0 0 8px #6C63FF55;">+ Add Reminder</a>
    </div>
    <div class="table-responsive">
        <table class="table table-dark table-hover table-borderless mb-0 fitforge-table">
            <thead>
                <tr style="color:#00C9A7;">
                    <th>User</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Reminder Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reminders as $reminder)
                    <tr>
                        <td>{{ $reminder->user->name ?? '-' }}</td>
                        <td>{{ $reminder->title }}</td>
                        <td>{{ $reminder->description ?? '-' }}</td>
                        <td>{{ $reminder->reminder_time }}</td>
                        <td>
                            <a href="{{ route('reminders.show', $reminder) }}" class="btn btn-info btn-sm rounded-pill mx-1">View</a>
                            <a href="{{ route('reminders.edit', $reminder) }}" class="btn btn-warning btn-sm rounded-pill mx-1">Edit</a>
                            <form action="{{ route('reminders.destroy', $reminder) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm rounded-pill mx-1" onclick="return confirm('Delete this reminder?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No reminders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $reminders->links() }}
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
    .fitforge-table th, .fitforge-table td {
        vertical-align: middle;
    }
    .btn-info {
        background: #00C9A7 !important;
        border: none !important;
        color: #fff !important;
        font-weight: 600;
        box-shadow: 0 0 8px #00C9A755 !important;
    }
    .btn-warning {
        background: #6C63FF !important;
        border: none !important;
        color: #fff !important;
        font-weight: 600;
        box-shadow: 0 0 8px #6C63FF55 !important;
    }
    .btn-danger {
        background: #ff4b5c !important;
        border: none !important;
        color: #fff !important;
        font-weight: 600;
        box-shadow: 0 0 8px #ff4b5c55 !important;
    }
    .btn-info:hover, .btn-warning:hover, .btn-danger:hover {
        opacity: 0.85;
    }
</style>
@endpush

@push('scripts')
<script>
// Store reminders in JS (only for current user)
const reminders = [
    @foreach($reminders as $reminder)
        @if(Auth::id() === $reminder->user_id)
        {
            id: {{ $reminder->id }},
            title: @json($reminder->title),
            description: @json($reminder->description),
            time: new Date(@json($reminder->reminder_time)),
            shown: false
        },
        @endif
    @endforeach
];

// Ask for notification permission
if ('Notification' in window && Notification.permission !== 'granted') {
    Notification.requestPermission();
}

// Poll every 30 seconds for due reminders
setInterval(function() {
    const now = new Date();
    reminders.forEach(reminder => {
        if (!reminder.shown && reminder.time <= now) {
            // Show notification
            if (Notification.permission === 'granted') {
                new Notification(reminder.title, {
                    body: reminder.description || 'You have a scheduled reminder!',
                    icon: '/favicon.ico'
                });
            } else {
                alert(reminder.title + '\n' + (reminder.description || 'You have a scheduled reminder!'));
            }
            reminder.shown = true;
        }
    });
}, 30000);
</script>
@endpush
