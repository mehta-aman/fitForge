<?php

namespace App\Http\Controllers;

use App\Models\Streak;
use App\Models\User;
use Illuminate\Http\Request;

class StreakController extends Controller
{
    // Display all streaks
    public function index()
    {
        $streaks = Streak::with('user')->latest()->paginate(10);
        return view('streaks.index', compact('streaks'));
    }

    // Show form to create a new streak
    public function create()
    {
        $users = User::all();
        return view('streaks.create', compact('users'));
    }

    // Store a new streak
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'     => 'required|exists:users,id',
            'days_streak' => 'required|integer|min:0',
        ]);

        Streak::create($validated);

        return redirect()->route('streaks.index')->with('success', 'Streak created successfully.');
    }

    // Show a specific streak
    public function show(Streak $streak)
    {
        return view('streaks.show', compact('streak'));
    }

    // Show form to edit a streak
    public function edit(Streak $streak)
    {
        $users = User::all();
        return view('streaks.edit', compact('streak', 'users'));
    }

    // Update an existing streak
    public function update(Request $request, Streak $streak)
    {
        $validated = $request->validate([
            'user_id'     => 'required|exists:users,id',
            'days_streak' => 'required|integer|min:0',
        ]);

        $streak->update($validated);

        return redirect()->route('streaks.index')->with('success', 'Streak updated successfully.');
    }

    // Delete a streak
    public function destroy(Streak $streak)
    {
        $streak->delete();

        return redirect()->route('streaks.index')->with('success', 'Streak deleted successfully.');
    }
}
