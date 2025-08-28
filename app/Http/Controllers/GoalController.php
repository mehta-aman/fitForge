<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\User;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    // List all goals
    public function index()
    {
        $goals = Goal::with('user')->latest()->paginate(10);
        return view('goals.index', compact('goals'));
    }

    // Show form to create a new goal
    public function create()
    {
        $users = User::all();
        return view('goals.create', compact('users'));
    }

    // Store a new goal
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'      => 'required|exists:users,id',
            'goal_type'    => 'required|string|max:255',
            'target_value' => 'required|numeric',
            'target_date'  => 'required|date|after_or_equal:today',
        ]);

        Goal::create($validated);

        return redirect()->route('goals.index')->with('success', 'Goal created successfully.');
    }

    // Show a single goal
    public function show(Goal $goal)
    {
        return view('goals.show', compact('goal'));
    }

    // Show form to edit a goal
    public function edit(Goal $goal)
    {
        $users = User::all();
        return view('goals.edit', compact('goal', 'users'));
    }

    // Update the goal
    public function update(Request $request, Goal $goal)
    {
        $validated = $request->validate([
            'user_id'      => 'required|exists:users,id',
            'goal_type'    => 'required|string|max:255',
            'target_value' => 'required|numeric',
            'target_date'  => 'required|date|after_or_equal:today',
        ]);

        $goal->update($validated);

        return redirect()->route('goals.index')->with('success', 'Goal updated successfully.');
    }

    // Delete the goal
    public function destroy(Goal $goal)
    {
        $goal->delete();

        return redirect()->route('goals.index')->with('success', 'Goal deleted successfully.');
    }
}
