@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('header', 'Admin Dashboard')

@section('content')
<div class="row mb-4">
    <!-- Admin Stat Card: Total Users -->
    <div class="col-md-3 mb-3">
        <div class="card fitforge-glow-card">
            <div class="card-body text-center">
                <h5 class="card-title" style="color:#6C63FF;">Total Users</h5>
                <p class="display-4 mb-0" style="color:#fff;">{{ $userCount ?? '...' }}</p>
            </div>
        </div>
    </div>
    <!-- Admin Stat Card: Total Exercises -->
    <div class="col-md-3 mb-3">
        <div class="card fitforge-glow-card">
            <div class="card-body text-center">
                <h5 class="card-title" style="color:#00C9A7;">Exercises</h5>
                <p class="display-4 mb-0" style="color:#fff;">{{ $exerciseCount ?? '...' }}</p>
                </div>
        </div>
    </div>
    <!-- Admin Stat Card: Task Section -->
    <div class="col-md-6 mb-3">
        <div class="card fitforge-glow-card">
            <div class="card-body text-center">
                <h5 class="card-title" style="color:#6C63FF;">Tasks</h5>
                <form id="admin-task-form" class="mb-3">
                    <div class="input-group">
                        <input type="text" id="admin-task-input" class="form-control" placeholder="Add new task..." style="background:#23234a;color:#fff;border:none;">
                        <button class="btn btn-primary" type="submit">Add</button>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-dark table-borderless table-hover align-middle mb-0" id="admin-task-table" style="background:transparent;">
                        <thead>
                            <tr style="color:#6C63FF;">
                                <th style="width:48px;">Done</th>
                                <th>Task</th>
                                <th style="width:120px;">Date Added</th>
                                <th style="width:60px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            <tr data-id="{{ $task->id }}">
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input" onchange="toggleTask({{ $task->id }})" {{ $task->is_completed ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <span class="{{ $task->is_completed ? 'text-decoration-line-through text-muted' : '' }}">{{ $task->title }}</span>
                                </td>
                                <td class="text-center" style="font-size:0.98rem; color:#bdbdd7;">
                                    {{ $task->created_at->format('Y-m-d h:i A') }}
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-danger" onclick="deleteTask({{ $task->id }})">X</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Admin Stat Card: Admin Info -->
    {{-- <div class="col-md-3 mb-3">
        <div class="card fitforge-glow-card">
            <div class="card-body text-center">
                <h5 class="card-title" style="color:#00C9A7;">Admin Info</h5>
                <div style="color:#fff; font-size:1.1rem;">
                    <div><b>{{ Auth::user()->name }}</b></div>
                    <div style="font-size:0.95rem; color:#bdbdd7;">{{ Auth::user()->email }}</div>
                </div>
            </div>
        </div>
    </div> --}}
</div>

<!-- Tabbed Views -->
<ul class="nav nav-tabs fitforge-tabs mb-3" id="dashboardTabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="routines-tab" data-toggle="tab" href="#routines" role="tab">Routines</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="progress-tab" data-toggle="tab" href="#progress" role="tab">Progress</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="feed-tab" data-toggle="tab" href="#feed" role="tab">Feed</a>
    </li>
</ul>
<div class="tab-content fitforge-tab-content" id="dashboardTabsContent">
    <div class="tab-pane fade show active" id="routines" role="tabpanel">
        <div class="card fitforge-glow-card p-4 mt-2">Routines content here</div>
    </div>
    <div class="tab-pane fade" id="progress" role="tabpanel">
        <div class="card fitforge-glow-card p-4 mt-2">Progress content here</div>
    </div>
    <div class="tab-pane fade" id="feed" role="tabpanel">
        <div class="card fitforge-glow-card p-4 mt-2">Feed content here</div>
    </div>
</div>
@endsection

@push('styles')
<style>
    body, .content-wrapper {
        background: #0e0e1b !important;
        color: #fff !important;
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
    .fitforge-tabs .nav-link.active {
        background: #6C63FF !important;
        color: #fff !important;
        border: none !important;
        border-radius: 1.2rem 1.2rem 0 0 !important;
        box-shadow: 0 0 12px #6C63FF99;
    }
    .fitforge-tabs .nav-link {
        color: #6C63FF !important;
        font-weight: 600;
        border: none !important;
        border-radius: 1.2rem 1.2rem 0 0 !important;
        margin-right: 4px;
        background: #18182a !important;
    }
    .fitforge-tab-content .card {
        background: rgba(20, 20, 40, 0.95) !important;
        border-radius: 1.2rem;
        color: #fff;
        border: none;
        box-shadow: 0 0 24px #6C63FF33;
    }
    @media (max-width: 767px) {
        .fitforge-glow-card, .fitforge-tab-content .card {
            padding: 1rem !important;
        }
        .display-4 {
            font-size: 2rem;
        }
    }
    #admin-task-table th, #admin-task-table td {
        vertical-align: middle;
        background: transparent !important;
        border: none !important;
    }
    #admin-task-table {
        color: #fff;
    }
    #admin-task-table .btn-danger {
        background: #ff4b5c !important;
        border: none !important;
        color: #fff !important;
        font-weight: 600;
        border-radius: 0.6rem !important;
        padding: 0.3rem 0.7rem !important;
    }
    #admin-task-table .btn-danger:hover {
        opacity: 0.85;
    }
</style>
@endpush

@push('scripts')
<script>
document.getElementById('admin-task-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const input = document.getElementById('admin-task-input');
    const title = input.value.trim();
    if (title) {
        fetch('{{ route('tasks.store') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ title: title })
        })
        .then(response => response.json())
        .then(task => {
            const tbody = document.querySelector('#admin-task-table tbody');
            const tr = document.createElement('tr');
            tr.setAttribute('data-id', task.id);
            const now = new Date();
            const hours = now.getHours() % 12 || 12;
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const ampm = now.getHours() >= 12 ? 'PM' : 'AM';
            const formatted = now.getFullYear() + '-' + String(now.getMonth()+1).padStart(2,'0') + '-' + String(now.getDate()).padStart(2,'0') + ' ' + hours + ':' + minutes + ' ' + ampm;
            tr.innerHTML = `
                <td class=\"text-center\">
                    <input type=\"checkbox\" class=\"form-check-input\" onchange=\"toggleTask(${task.id})\">
                </td>
                <td><span>${task.title}</span></td>
                <td class=\"text-center\" style=\"font-size:0.98rem; color:#bdbdd7;\">${formatted}</td>
                <td class=\"text-center\">
                    <button class=\"btn btn-sm btn-danger\" onclick=\"deleteTask(${task.id})\">X</button>
                </td>
            `;
            tbody.prepend(tr);
            input.value = '';
        });
    }
});

function toggleTask(id) {
    const tr = document.querySelector(`tr[data-id='${id}']`);
    const checkbox = tr.querySelector('input[type="checkbox"]');
    const isCompleted = checkbox.checked;

    fetch(`/tasks/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ is_completed: isCompleted })
    })
    .then(response => response.json())
    .then(task => {
        const span = tr.querySelector('span');
        span.classList.toggle('text-decoration-line-through', task.is_completed);
        span.classList.toggle('text-muted', task.is_completed);
    });
}

function deleteTask(id) {
    if (confirm('Are you sure you want to delete this task?')) {
        fetch(`/tasks/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).then(() => {
            document.querySelector(`tr[data-id='${id}']`).remove();
        });
    }
}
</script>
@endpush
