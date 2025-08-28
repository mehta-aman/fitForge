<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // List all users
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    // Show form to create a new user
    public function create()
    {
        return view('users.create');
    }

    // Store new user in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'required|string|email|max:255|unique:users',
            'password'         => 'required|string|min:8|confirmed',
            'role'             => 'required|string',
            'age'              => 'nullable|integer',
            'gender'           => 'nullable|string|in:male,female,other',
            'height'           => 'nullable|numeric',
            'weight'           => 'nullable|numeric',
            'activity_level'   => 'nullable|string|in:sedentary,lightly_active,moderately_active,very_active,extra_active',
            'health_conditions'=> 'nullable|array',
            'health_conditions.*'=> 'string|in:none,diabetes,heart_disease,hypertension,asthma,joint_pain,back_pain,allergies',
            'goals'            => 'nullable|array',
            'goals.*'          => 'string|in:weight_loss,muscle_gain,improve_cardio,increase_strength,flexibility,endurance,overall_fitness,stress_reduction',
            'phone'            => 'nullable|string|max:20',
            'birthdate'        => 'nullable|date',
            'username'         => 'nullable|string|max:255|unique:users',
            'preferred_language'=> 'nullable|string|max:50',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        if (isset($validated['health_conditions'])) {
            $validated['health_conditions'] = implode(',', $validated['health_conditions']);
        }

        if (isset($validated['goals'])) {
            $validated['goals'] = implode(',', $validated['goals']);
        }

        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Show a single user
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Show form to edit user
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Update user in the database
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => ['required','string','email','max:255', Rule::unique('users')->ignore($user->id)],
            'password'         => 'nullable|string|min:8|confirmed',
            'role'             => 'required|string',
            'age'              => 'nullable|integer',
            'gender'           => 'nullable|string|in:male,female,other',
            'height'           => 'nullable|numeric',
            'weight'           => 'nullable|numeric',
            'activity_level'   => 'nullable|string|in:sedentary,lightly_active,moderately_active,very_active,extra_active',
            'health_conditions'=> 'nullable|array',
            'health_conditions.*'=> 'string|in:none,diabetes,heart_disease,hypertension,asthma,joint_pain,back_pain,allergies',
            'goals'            => 'nullable|array',
            'goals.*'          => 'string|in:weight_loss,muscle_gain,improve_cardio,increase_strength,flexibility,endurance,overall_fitness,stress_reduction',
            'phone'            => 'nullable|string|max:20',
            'birthdate'        => 'nullable|date',
            'username'         => ['nullable', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'preferred_language'=> 'nullable|string|max:50',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        if (isset($validated['health_conditions'])) {
            $validated['health_conditions'] = implode(',', $validated['health_conditions']);
        } else {
            $validated['health_conditions'] = null;
        }

        if (isset($validated['goals'])) {
            $validated['goals'] = implode(',', $validated['goals']);
        } else {
            $validated['goals'] = null;
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Delete user from the database
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
