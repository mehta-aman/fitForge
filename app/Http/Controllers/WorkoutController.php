<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use App\Models\User;
use App\Models\Exercise;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    // Display a list of all workouts
    public function index()
    {
        $workouts = Workout::with('user')->latest()->paginate(10);
        return view('workouts.index', compact('workouts'));
    }

    // Show the form for creating a new workout
    public function create()
    {
        $users = User::all();
        $exercises = Exercise::all();
        $equipmentOptions = Exercise::query()->whereNotNull('equipment')->pluck('equipment')->unique()->values();
        $muscleOptions = Exercise::query()->whereNotNull('muscle_group')->pluck('muscle_group')->unique()->values();
        return view('workouts.create', compact('users', 'exercises', 'equipmentOptions', 'muscleOptions'));
    }

    // Store a newly created workout
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'         => 'required|exists:users,id',
            'title'           => 'required|string|max:255',
            'date'            => 'required|date',
            'duration'        => 'nullable|integer|min:0',
            'intensity'       => 'nullable|string|max:50',
            'calories_burned' => 'nullable|numeric|min:0',
            'is_completed'    => 'boolean',
            'location'        => 'nullable|string|max:255',
            'mood'            => 'nullable|string|max:50',
            'notes'           => 'nullable|string',
        ]);

        Workout::create($validated);

        return redirect()->route('workouts.index')->with('success', 'Workout created successfully.');
    }

    // Display the specified workout
    public function show(Workout $workout)
    {
        $workout->load('workoutExercises');
        return view('workouts.show', compact('workout'));
    }

    // Show the form for editing a workout
    public function edit(Workout $workout)
    {
        $users = User::all();
        return view('workouts.edit', compact('workout', 'users'));
    }

    // Update the specified workout
    public function update(Request $request, Workout $workout)
    {
        $validated = $request->validate([
            'user_id'         => 'required|exists:users,id',
            'title'           => 'required|string|max:255',
            'date'            => 'required|date',
            'duration'        => 'nullable|integer|min:0',
            'intensity'       => 'nullable|string|max:50',
            'calories_burned' => 'nullable|numeric|min:0',
            'is_completed'    => 'boolean',
            'location'        => 'nullable|string|max:255',
            'mood'            => 'nullable|string|max:50',
            'notes'           => 'nullable|string',
        ]);

        $workout->update($validated);

        return redirect()->route('workouts.index')->with('success', 'Workout updated successfully.');
    }

    // Remove the specified workout
    public function destroy(Workout $workout)
    {
        $workout->delete();

        return redirect()->route('workouts.index')->with('success', 'Workout deleted successfully.');
    }
}
