<?php

namespace App\Http\Controllers;

use App\Models\ProgressLog;
use App\Models\User;
use App\Models\WorkoutExercise;
use Illuminate\Http\Request;

class ProgressLogController extends Controller
{
    // Display a list of all progress logs
    public function index()
    {
        $logs = ProgressLog::with(['user', 'workoutExercise'])->latest()->get();
        // Group logs by month
        $monthly = $logs->groupBy(function($log) {
            return \Carbon\Carbon::parse($log->date)->format('Y-m');
        });
        $chartData = [
            'labels' => [],
            'weight_lifted' => [],
            'calories_burned' => [],
            'reps_completed' => [],
        ];
        $summary = [];
        foreach ($monthly as $month => $group) {
            $chartData['labels'][] = $month;
            $chartData['weight_lifted'][] = $group->sum('weight_lifted');
            $chartData['calories_burned'][] = $group->sum('calories_burned');
            $chartData['reps_completed'][] = $group->sum('reps_completed');
            $summary[$month] = [
                'weight_lifted_avg' => $group->avg('weight_lifted'),
                'weight_lifted_max' => $group->max('weight_lifted'),
                'calories_burned_avg' => $group->avg('calories_burned'),
                'calories_burned_max' => $group->max('calories_burned'),
                'reps_completed_avg' => $group->avg('reps_completed'),
                'reps_completed_max' => $group->max('reps_completed'),
            ];
        }
        return view('progress_logs.index', compact('chartData', 'summary'));
    }

    // Show the form to create a new log
    public function create()
    {
        $users = User::all();
        $workoutExercises = WorkoutExercise::all();
        return view('progress_logs.create', compact('users', 'workoutExercises'));
    }

    // Store a new progress log
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'             => 'required|exists:users,id',
            'workout_exercise_id' => 'required|exists:workout_exercises,id',
            'date'                => 'required|date',
            'sets_completed'      => 'nullable|integer|min:0',
            'reps_completed'      => 'nullable|integer|min:0',
            'weight_lifted'       => 'nullable|numeric|min:0',
            'calories_burned'     => 'nullable|numeric|min:0',
        ]);

        ProgressLog::create($validated);

        return redirect()->route('progress_logs.index')->with('success', 'Progress log created successfully.');
    }

    // Show a specific log
    public function show(ProgressLog $progress_log)
    {
        return view('progress_logs.show', compact('progress_log'));
    }

    // Show the form to edit a progress log
    public function edit(ProgressLog $progress_log)
    {
        $users = User::all();
        $workoutExercises = WorkoutExercise::all();
        return view('progress_logs.edit', compact('progress_log', 'users', 'workoutExercises'));
    }

    // Update the progress log
    public function update(Request $request, ProgressLog $progress_log)
    {
        $validated = $request->validate([
            'user_id'             => 'required|exists:users,id',
            'workout_exercise_id' => 'required|exists:workout_exercises,id',
            'date'                => 'required|date',
            'sets_completed'      => 'nullable|integer|min:0',
            'reps_completed'      => 'nullable|integer|min:0',
            'weight_lifted'       => 'nullable|numeric|min:0',
            'calories_burned'     => 'nullable|numeric|min:0',
        ]);

        $progress_log->update($validated);

        return redirect()->route('progress_logs.index')->with('success', 'Progress log updated successfully.');
    }

    // Delete the progress log
    public function destroy(ProgressLog $progress_log)
    {
        $progress_log->delete();

        return redirect()->route('progress_logs.index')->with('success', 'Progress log deleted successfully.');
    }
}
