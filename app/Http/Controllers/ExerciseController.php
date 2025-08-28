<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    // Display all exercises
    public function index()
    {
        $exercises = Exercise::latest()->get();
        $equipmentOptions = Exercise::whereNotNull('equipment')->pluck('equipment')->unique()->toArray();
        $muscleGroupOptions = Exercise::whereNotNull('muscle_group')->pluck('muscle_group')->unique()->toArray();
        return view('exercises.index', compact('exercises', 'equipmentOptions', 'muscleGroupOptions'));
    }

    // Show form to create a new exercise
    public function create()
    {
        $muscleGroupOptions = Exercise::whereNotNull('muscle_group')->pluck('muscle_group')->unique()->toArray();
        return view('exercises.create', compact('muscleGroupOptions'));
    }

    // Store a new exercise
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'category'     => 'nullable|string|max:255',
            'muscle_group' => 'nullable|string|max:255',
            'equipment'    => 'nullable|string|max:255',
            'difficulty'   => 'nullable|string|in:easy,medium,hard',
            'duration'     => 'nullable|integer|min:0',
            'description'  => 'nullable|string',
            'media_url'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'is_active'    => 'boolean',
        ]);

        if ($request->hasFile('media_url')) {
            $path = $request->file('media_url')->store('exercises', 'public');
            $validated['media_url'] = '/storage/' . $path;
        }

        Exercise::create($validated);

        return redirect()->route('exercises.index')->with('success', 'Exercise created successfully.');
    }

    // Display a specific exercise
    public function show(Exercise $exercise)
    {
        return view('exercises.show', compact('exercise'));
    }

    // Show form to edit an exercise
    public function edit(Exercise $exercise)
    {
        $muscleGroupOptions = Exercise::whereNotNull('muscle_group')->pluck('muscle_group')->unique()->toArray();
        return view('exercises.edit', compact('exercise', 'muscleGroupOptions'));
    }

    // Update an exercise
    public function update(Request $request, Exercise $exercise)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'category'     => 'nullable|string|max:255',
            'muscle_group' => 'nullable|string|max:255',
            'secondary_muscle_group' => 'nullable|string|max:255',
            'equipment'    => 'nullable|string|max:255',
            'difficulty'   => 'nullable|string|in:easy,medium,hard',
            'duration'     => 'nullable|integer|min:0',
            'description'  => 'nullable|string',
            'media_url'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'is_active'    => 'boolean',
        ]);

        if ($request->hasFile('media_url')) {
            $path = $request->file('media_url')->store('exercises', 'public');
            $validated['media_url'] = '/storage/' . $path;
        } else {
            // Keep the old image if not uploading a new one
            $validated['media_url'] = $exercise->media_url;
        }

        $exercise->update($validated);

        return redirect()->route('exercises.index')->with('success', 'Exercise updated successfully.');
    }

    // Delete an exercise
    public function destroy(Exercise $exercise)
    {
        $exercise->delete();

        return redirect()->route('exercises.index')->with('success', 'Exercise deleted successfully.');
    }

    public function getExerciseDetails(Exercise $exercise)
    {
        return response()->json($exercise);
    }
}
