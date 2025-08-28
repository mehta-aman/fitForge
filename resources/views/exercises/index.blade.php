@extends('layouts.user')

@section('title', 'Exercise Library')
@section('header', 'Exercise Library')

@section('content')
<div class="row">
    <!-- Main Exercise Detail Area -->
    <div class="col-lg-8 mb-4">
        <div class="card fitforge-glow-card p-4 h-100 d-flex align-items-center justify-content-center" id="exercise-detail-area">
            <div class="text-center" id="exercise-detail-placeholder">
                <i class="fas fa-dumbbell" style="font-size:2.5rem;color:#6C63FF;"></i>
                <h5 class="mt-3" style="color:#6C63FF;">Select Exercise</h5>
                <p class="text-muted">Click on an exercise to see statistics about it.</p>
            </div>
            <!-- JS will inject exercise details here -->
        </div>
    </div>
    <!-- Exercise Library Sidebar -->
    <div class="col-lg-4">
        <div class="card fitforge-glow-card p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0" style="color:#6C63FF;">Library</h5>
                <a href="{{ route('exercises.create') }}" class="btn btn-link p-0" style="color:#00C9A7; font-weight:600;">+ Custom Exercise</a>
            </div>
            <div class="form-group mb-2">
                <select class="form-control fitforge-input mb-2" id="equipmentFilter">
                    <option value="">All Equipment</option>
                    @foreach($equipmentOptions as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
                <select class="form-control fitforge-input mb-2" id="muscleFilter">
                    <option value="">All Muscles</option>
                    @foreach($muscleGroupOptions as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
                <input type="text" class="form-control fitforge-input" placeholder="Search Exercises" id="searchExercises">
            </div>
            <div class="mb-2" style="font-weight:600; color:#bdbdd7;">All Exercises</div>
            <div id="exercise-library" style="max-height: 65vh; overflow-y: auto;">
                @foreach($exercises as $exercise)
                    <div class="d-flex align-items-center mb-2 p-2 fitforge-exercise-list-item exercise-list-item-selectable position-relative" data-id="{{ $exercise->id }}" style="cursor:pointer;">
                        <div class="exercise-img-selectable" style="margin-right:12px;">
                            <img src="{{ $exercise->media_url ?? asset('default-exercise.png') }}" alt="" width="40" height="40" class="rounded-circle bg-white" style="object-fit:cover;">
                        </div>
                        <div class="flex-grow-1">
                            <div style="font-weight:600; color:#fff;">
                                {{ $exercise->name }}
                                @if($exercise->external_id)
                                    <span class="badge bg-info ms-2" style="font-size:0.7em; background:#00C9A7 !important; color:#fff;">Global</span>
                                @endif
                            </div>
                            <div class="text-muted" style="font-size:0.9em;">
                                {{ $exercise->muscle_group ?? 'N/A' }}
                                @if($exercise->equipment)
                                    &bull; {{ $exercise->equipment }}
                                @endif
                                @if($exercise->difficulty)
                                    &bull; {{ ucfirst($exercise->difficulty) }}
                                @endif
                            </div>
                        </div>
                        <div class="exercise-actions d-flex align-items-center ms-2" style="opacity:0; transition:opacity 0.2s;">
                            <a href="{{ route('exercises.edit', $exercise) }}" class="btn btn-link p-0 me-2" title="Edit" style="color:#00C9A7; font-size:1.2rem;"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('exercises.destroy', $exercise) }}" method="POST" onsubmit="return confirm('Delete this exercise?')" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link p-0" title="Delete" style="color:#ff4b5c; font-size:1.2rem;"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
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
    .fitforge-exercise-list-item {
        background: rgba(30,30,50,0.7);
        border-radius: 1rem;
        transition: box-shadow 0.2s, background 0.2s;
        position: relative;
    }
    .fitforge-exercise-list-item:hover, .fitforge-exercise-list-item.active {
        background: #23234a;
        box-shadow: 0 0 16px #6C63FF33;
    }
    .fitforge-exercise-list-item:hover .exercise-actions {
        opacity: 1 !important;
    }
    .exercise-actions .btn-link {
        border-radius: 50%;
        transition: background 0.2s, color 0.2s;
    }
    .exercise-actions .btn-link:hover {
        background: #18182a;
        color: #fff !important;
        box-shadow: 0 0 8px #6C63FF55;
    }
    #exercise-detail-area {
        min-height: 400px;
        min-width: 100%;
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
    @media (max-width: 991px) {
        #exercise-detail-area {
            min-height: 250px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
// --- Live Filtering and Sorting ---
const allExercises = @json($exercises->sortBy('name')->values());

function renderExerciseList(list) {
    const container = document.getElementById('exercise-library');
    container.innerHTML = '';
    list.forEach(exercise => {
        const div = document.createElement('div');
        div.className = 'd-flex align-items-center mb-2 p-2 fitforge-exercise-list-item exercise-list-item-selectable position-relative';
        div.setAttribute('data-id', exercise.id);
        div.style.cursor = 'pointer';
        div.innerHTML = `
            <div class='exercise-img-selectable' style='margin-right:12px;'>
                <img src='${exercise.media_url ?? '/default-exercise.png'}' alt='' width='40' height='40' class='rounded-circle bg-white' style='object-fit:cover;'>
            </div>
            <div class='flex-grow-1'>
                <div style='font-weight:600; color:#fff;'>
                    ${exercise.name}
                    ${exercise.external_id ? `<span class='badge bg-info ms-2' style='font-size:0.7em; background:#00C9A7 !important; color:#fff;'>Global</span>` : ''}
                </div>
                <div class='text-muted' style='font-size:0.9em;'>
                    ${(exercise.muscle_group ?? 'N/A')}
                    ${exercise.equipment ? ` &bull; ${exercise.equipment}` : ''}
                    ${exercise.difficulty ? ` &bull; ${exercise.difficulty.charAt(0).toUpperCase() + exercise.difficulty.slice(1)}` : ''}
                </div>
            </div>
            <div class='exercise-actions d-flex align-items-center ms-2' style='opacity:0; transition:opacity 0.2s;'>
                <a href='/exercises/${exercise.id}/edit' class='btn btn-link p-0 me-2' title='Edit' style='color:#00C9A7; font-size:1.2rem;'><i class='fas fa-edit'></i></a>
                <form action='/exercises/${exercise.id}' method='POST' onsubmit='return confirm("Delete this exercise?")' class='d-inline'>
                    <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                    <input type='hidden' name='_method' value='DELETE'>
                    <button type='submit' class='btn btn-link p-0' title='Delete' style='color:#ff4b5c; font-size:1.2rem;'><i class='fas fa-trash-alt'></i></button>
                </form>
            </div>
        `;
        container.appendChild(div);
    });
    attachExerciseRowEvents();
}

function filterAndRender() {
    const equipment = document.getElementById('equipmentFilter').value;
    const muscle = document.getElementById('muscleFilter').value;
    const search = document.getElementById('searchExercises').value.toLowerCase();
    let filtered = allExercises;
    if (equipment) filtered = filtered.filter(e => e.equipment === equipment);
    if (muscle) filtered = filtered.filter(e => e.muscle_group === muscle);
    if (search) filtered = filtered.filter(e => e.name.toLowerCase().includes(search));
    renderExerciseList(filtered);
}

document.getElementById('equipmentFilter').addEventListener('change', filterAndRender);
document.getElementById('muscleFilter').addEventListener('change', filterAndRender);
document.getElementById('searchExercises').addEventListener('input', filterAndRender);

function attachExerciseRowEvents() {
    const exerciseRows = document.querySelectorAll('.exercise-list-item-selectable');
    exerciseRows.forEach(function(row) {
        row.addEventListener('click', function(e) {
            if (e.target.closest('.exercise-actions')) return;
            document.querySelectorAll('.exercise-list-item-selectable').forEach(i => i.classList.remove('active'));
            row.classList.add('active');
            const exerciseId = row.dataset.id;
            fetch(`/exercises/${exerciseId}/details`)
                .then(response => response.json())
                .then(exercise => {
                    document.getElementById('exercise-detail-area').innerHTML = `
                        <div class='row w-100'>
                            <div class='col-md-8'>
                                <h3 style='color:#6C63FF;'>${exercise.name} ${exercise.category ? `(${exercise.category})` : ''}</h3>
                                <div class='text-muted'>
                                    <p><strong>Equipment:</strong> ${exercise.equipment ?? 'N/A'}</p>
                                    <p><strong>Primary Muscle Group:</strong> ${exercise.muscle_group ?? 'N/A'}</p>
                                    <p><strong>Secondary Muscle Group:</strong> ${exercise.secondary_muscle_group ?? 'N/A'}</p>
                                    <p><strong>Difficulty:</strong> ${exercise.difficulty ? exercise.difficulty.charAt(0).toUpperCase() + exercise.difficulty.slice(1) : 'N/A'}</p>
                                    <p><strong>Duration:</strong> ${exercise.duration ? `${exercise.duration} minutes` : 'N/A'}</p>
                                </div>
                            </div>
                            <div class='col-md-4 text-center d-flex align-items-center justify-content-center'>
                                <img src='${exercise.media_url ?? '/default-exercise.png'}' alt='' style='max-width:100%;max-height:200px;border-radius:1rem;background:#fff;padding:8px;object-fit:cover;'>
                            </div>
                        </div>
                        <div class='mt-4 w-100'>
                            <h5 style='color:#6C63FF;'>Description</h5>
                            <p class='text-muted'>${exercise.description ?? 'No description available.'}</p>
                        </div>
                        <div class='mt-4 w-100'>
                            <h5 style='color:#6C63FF;'>Statistics</h5>
                            <div class='text-muted'>No data available for the selected timeframe.</div>
                        </div>
                    `;
                })
                .catch(error => {
                    console.error('Error fetching exercise details:', error);
                    document.getElementById('exercise-detail-area').innerHTML = `<p class='text-danger'>Error loading exercise details.</p>`;
                });
        });
    });
}

// Initial render
renderExerciseList(allExercises);
</script>
@endpush
