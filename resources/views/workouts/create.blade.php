@extends('layouts.user')

@section('title', 'Create Routine')
@section('header', 'Create Routine')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <!-- Main Routine Builder -->
        <div class="col-12 col-lg-8 mb-4 mb-lg-0">
            <form method="POST" action="{{ route('workouts.store') }}" id="routineForm">
                @csrf
                <div class="d-flex align-items-center mb-3">
                    <input type="text" name="title" id="title" class="form-control fitforge-input me-3" placeholder="Workout Routine Title" style="max-width:400px;" required>
                    <button type="submit" class="btn btn-primary rounded-pill px-4" id="saveRoutineBtn" disabled style="font-weight:600; box-shadow:0 0 8px #6C63FF55;">Save Routine</button>
                </div>
                <div class="card fitforge-glow-card p-4" id="routine-exercises-area">
                    <div class="text-center py-5" id="no-exercises">
                        <i class="fas fa-dumbbell mb-3" style="font-size:2.5rem;color:#6C63FF;"></i>
                        <h5 class="mb-1" style="color:#6C63FF;">No Exercises</h5>
                        <p class="text-muted mb-0">So far, you haven't added any exercises to this routine.</p>
                    </div>
                    <ul class="list-group list-group-flush" id="routine-exercise-list" style="display:none;"></ul>
                </div>
                <!-- Hidden input to store selected exercises -->
                <input type="hidden" name="exercises" id="exercisesInput">
            </form>
        </div>
        <!-- Exercise Library Sidebar -->
        <div class="col-12 col-lg-4">
            <div class="card fitforge-glow-card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0" style="color:#6C63FF;">Library</h5>
                    <a href="{{ route('exercises.create') }}" class="btn btn-link p-0" style="color:#00C9A7; font-weight:600;">+ Custom Exercise</a>
                </div>
                <div class="form-group mb-2">
                    <select class="form-control fitforge-input mb-2" id="equipmentFilter">
                        <option value="">All Equipment</option>
                        @foreach($equipmentOptions as $equipment)
                            <option value="{{ $equipment }}">{{ $equipment }}</option>
                        @endforeach
                    </select>
                    <select class="form-control fitforge-input mb-2" id="muscleFilter">
                        <option value="">All Muscles</option>
                        @foreach($muscleOptions as $muscle)
                            <option value="{{ $muscle }}">{{ $muscle }}</option>
                        @endforeach
                    </select>
                    <input type="text" class="form-control fitforge-input" placeholder="Search Exercises" id="searchExercises">
                </div>
                <div class="mb-2" style="font-weight:600; color:#bdbdd7;">Popular Exercises</div>
                <div id="exercise-library" style="max-height: 65vh; overflow-y: auto;">
                    @foreach($exercises as $exercise)
                        <div class="d-flex align-items-center mb-2 p-2 fitforge-exercise-list-item exercise-list-item-selectable" data-id="{{ $exercise->id }}" data-name="{{ $exercise->name }}" data-muscle="{{ $exercise->muscle_group }}" data-equipment="{{ $exercise->equipment }}" style="cursor:pointer;">
                            <button type="button" class="btn btn-link p-0 me-2 add-exercise-btn" title="Add Exercise" style="color:#00C9A7;font-size:1.3rem;"><i class="fas fa-plus-circle"></i></button>
                            <img src="{{ $exercise->media_url ?? asset('default-exercise.png') }}" alt="" width="40" height="40" class="mr-3 rounded-circle bg-white" style="object-fit:cover;">
                            <div class="flex-grow-1">
                                <div style="font-weight:600; color:#fff;">{{ $exercise->name }}</div>
                                <div class="text-muted" style="font-size:0.9em;">{{ $exercise->muscle_group }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
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
    .fitforge-exercise-list-item {
        background: rgba(30,30,50,0.7);
        border-radius: 1rem;
        transition: box-shadow 0.2s, background 0.2s;
    }
    .fitforge-exercise-list-item:hover, .fitforge-exercise-list-item.active {
        background: #23234a;
        box-shadow: 0 0 16px #6C63FF33;
    }
    #routine-exercises-area {
        min-height: 180px;
    }
    @media (max-width: 991px) {
        #routine-exercises-area {
            min-height: 120px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
// Routine builder logic
const exerciseList = document.getElementById('routine-exercise-list');
const noExercises = document.getElementById('no-exercises');
const exercisesInput = document.getElementById('exercisesInput');
const saveBtn = document.getElementById('saveRoutineBtn');
const titleInput = document.getElementById('title');
let selectedExercises = [];

function updateRoutineList() {
    exerciseList.innerHTML = '';
    if (selectedExercises.length === 0) {
        exerciseList.style.display = 'none';
        noExercises.style.display = 'block';
        saveBtn.disabled = true;
    } else {
        exerciseList.style.display = 'block';
        noExercises.style.display = 'none';
        selectedExercises.forEach((ex, idx) => {
            const li = document.createElement('li');
            li.className = 'list-group-item bg-transparent text-light d-flex align-items-center justify-content-between';
            li.innerHTML = `<span><b>${ex.name}</b> <span class='text-muted' style='font-size:0.9em;'>${ex.muscle}</span></span>
                <button type='button' class='btn btn-link text-danger remove-ex-btn' data-idx='${idx}'><i class='fas fa-trash'></i></button>`;
            exerciseList.appendChild(li);
        });
        saveBtn.disabled = !titleInput.value.trim();
    }
    exercisesInput.value = JSON.stringify(selectedExercises);
}

document.querySelectorAll('.add-exercise-btn').forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.stopPropagation();
        const parent = btn.closest('.exercise-list-item-selectable');
        const id = parent.getAttribute('data-id');
        const name = parent.getAttribute('data-name');
        const muscle = parent.getAttribute('data-muscle');
        if (!selectedExercises.some(ex => ex.id === id)) {
            selectedExercises.push({id, name, muscle});
            updateRoutineList();
        }
    });
});

exerciseList.addEventListener('click', function(e) {
    if (e.target.closest('.remove-ex-btn')) {
        const idx = e.target.closest('.remove-ex-btn').getAttribute('data-idx');
        selectedExercises.splice(idx, 1);
        updateRoutineList();
    }
});

titleInput.addEventListener('input', function() {
    saveBtn.disabled = !(titleInput.value.trim() && selectedExercises.length > 0);
});

// Filtering logic
const equipmentFilter = document.getElementById('equipmentFilter');
const muscleFilter = document.getElementById('muscleFilter');
const searchInput = document.getElementById('searchExercises');
const exerciseItems = document.querySelectorAll('.exercise-list-item-selectable');

function filterExercises() {
    const eq = equipmentFilter.value.toLowerCase();
    const mu = muscleFilter.value.toLowerCase();
    const search = searchInput.value.toLowerCase();
    exerciseItems.forEach(item => {
        const itemEq = item.getAttribute('data-equipment').toLowerCase();
        const itemMu = item.getAttribute('data-muscle').toLowerCase();
        const itemName = item.getAttribute('data-name').toLowerCase();
        let show = true;
        if (eq && itemEq !== eq) show = false;
        if (mu && itemMu !== mu) show = false;
        if (search && !itemName.includes(search)) show = false;
        item.style.display = show ? '' : 'none';
    });
}
equipmentFilter.addEventListener('change', filterExercises);
muscleFilter.addEventListener('change', filterExercises);
searchInput.addEventListener('input', filterExercises);
</script>
@endpush
