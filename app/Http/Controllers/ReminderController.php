<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use App\Models\User;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    // Display a listing of reminders
    public function index()
    {
        $reminders = Reminder::with('user')->latest()->paginate(10);
        return view('reminders.index', compact('reminders'));
    }

    // Show the form for creating a new reminder
    public function create()
    {
        $users = User::all();
        return view('reminders.create', compact('users'));
    }

    // Store a newly created reminder
    public function store(Request $request)
    {
        // Convert reminder_time from HTML5 input to Y-m-d H:i:s
        if ($request->has('reminder_time')) {
            $reminderTime = $request->input('reminder_time');
            $reminderTime = str_replace('T', ' ', $reminderTime);
            if (strlen($reminderTime) == 16) { // e.g. 2025-07-10 22:44
                $reminderTime .= ':00';
            }
            $request->merge(['reminder_time' => $reminderTime]);
        }
        $validated = $request->validate([
            'user_id'       => 'required|exists:users,id',
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'reminder_time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        Reminder::create($validated);

        return redirect()->route('reminders.index')->with('success', 'Reminder created successfully.');
    }

    // Display a specific reminder
    public function show(Reminder $reminder)
    {
        return view('reminders.show', compact('reminder'));
    }

    // Show the form for editing a reminder
    public function edit(Reminder $reminder)
    {
        $users = User::all();
        return view('reminders.edit', compact('reminder', 'users'));
    }

    // Update the specified reminder
    public function update(Request $request, Reminder $reminder)
    {
        // Convert reminder_time from HTML5 input to Y-m-d H:i:s
        if ($request->has('reminder_time')) {
            $reminderTime = $request->input('reminder_time');
            $reminderTime = str_replace('T', ' ', $reminderTime);
            if (strlen($reminderTime) == 16) {
                $reminderTime .= ':00';
            }
            $request->merge(['reminder_time' => $reminderTime]);
        }
        $validated = $request->validate([
            'user_id'       => 'required|exists:users,id',
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'reminder_time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $reminder->update($validated);

        return redirect()->route('reminders.index')->with('success', 'Reminder updated successfully.');
    }

    // Remove the specified reminder
    public function destroy(Reminder $reminder)
    {
        $reminder->delete();

        return redirect()->route('reminders.index')->with('success', 'Reminder deleted successfully.');
    }
}
