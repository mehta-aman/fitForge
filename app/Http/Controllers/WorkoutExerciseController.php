<?php

namespace App\Http\Controllers;

use App\Models\WorkoutExercise;
use App\Models\Workout;
use App\Models\Exercise;
use Illuminate\Http\Request;

class WorkoutExerciseController extends Controller
{
    // List all workout-exercise assignments
    public function index()
    {
        $workoutExercises = WorkoutExercise::with(['workout', 'exercise'])->latest()->paginate(10);
        return view('workout_exercises.index', compact('workoutExercises'));
    }

    // Show form to create a new workout-exercise assignment
    public function create()
    {
        $workouts = Workout::all();
        $exercises = Exercise::where('is_active', true)->get();
        return view('workout_exercises.create', compact('workouts', 'exercises'));
    }

    // Store a new assignment
    public function store(Request $request)
    {
        $validated = $request->validate([
            'workout_id' => 'required|exists:workouts,id',
            'exercise_id' => 'required|exists:exercises,id',
            'sets' => 'nullable|integer|min:1',
            'reps' => 'nullable|integer|min:1',
            'rest_time' => 'nullable|integer|min:0',
            'weight' => 'nullable|numeric|min:0',
            'duration' => 'nullable|integer|min:0',
        ]);

        WorkoutExercise::create($validated);

        return redirect()->route('workout-exercises.index')->with('success', 'Exercise added to workout successfully.');
    }

    // Show a specific workout-exercise
    public function show(WorkoutExercise $workoutExercise)
    {
        return view('workout_exercises.show', compact('workoutExercise'));
    }

    // Show form to edit a workout-exercise
    public function edit(WorkoutExercise $workoutExercise)
    {
        $workouts = Workout::all();
        $exercises = Exercise::where('is_active', true)->get();
        return view('workout_exercises.edit', compact('workoutExercise', 'workouts', 'exercises'));
    }

    // Update the workout-exercise record
    public function update(Request $request, WorkoutExercise $workoutExercise)
    {
        $validated = $request->validate([
            'workout_id' => 'required|exists:workouts,id',
            'exercise_id' => 'required|exists:exercises,id',
            'sets' => 'nullable|integer|min:1',
            'reps' => 'nullable|integer|min:1',
            'rest_time' => 'nullable|integer|min:0',
            'weight' => 'nullable|numeric|min:0',
            'duration' => 'nullable|integer|min:0',
        ]);

        $workoutExercise->update($validated);

        return redirect()->route('workout-exercises.index')->with('success', 'Workout exercise updated successfully.');
    }

    // Delete a workout-exercise assignment
    public function destroy(WorkoutExercise $workoutExercise)
    {
        $workoutExercise->delete();

        return redirect()->route('workout-exercises.index')->with('success', 'Workout exercise removed successfully.');
    }
}
