<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeasurementController extends Controller
{
    // Show all measurements
    public function index()
    {
        if (Auth::user() && Auth::user()->role === 'admin') {
            $measurements = Measurement::with('user')->latest()->paginate(10);
        } else {
            $measurements = Measurement::with('user')->where('user_id', Auth::id())->latest()->paginate(10);
        }
        $latestMeasurement = null;
        if (Auth::check()) {
            $latestMeasurement = Measurement::where('user_id', Auth::id())->latest()->first();
        }
        return view('measurements.index', compact('measurements', 'latestMeasurement'));
    }

    // Show form to create a new measurement
    public function create()
    {
        $users = User::all();
        $latestMeasurement = null;
        if (Auth::check()) {
            $latestMeasurement = Measurement::where('user_id', Auth::id())->latest()->first();
        }
        return view('measurements.create', compact('users', 'latestMeasurement'));
    }

    // Store a new measurement
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'              => 'required|exists:users,id',
            'weight'               => 'nullable|numeric',
            'waist_circumference'  => 'nullable|numeric',
            'hip_circumference'    => 'nullable|numeric',
            'chest_circumference'  => 'nullable|numeric',
            'shoulder_circumference'=> 'nullable|numeric',
            'thigh_circumference'  => 'nullable|numeric',
            'height'               => 'nullable|numeric',
            'body_fat_percentage'  => 'nullable|numeric',
            'date'                 => 'required|date',
        ]);

        Measurement::create($validated);

        return redirect()->route('measurements.index')->with('success', 'Measurement recorded successfully.');
    }

    // Show a specific measurement
    public function show(Measurement $measurement)
    {
        return view('measurements.show', compact('measurement'));
    }

    // Show form to edit a measurement
    public function edit(Measurement $measurement)
    {
        $users = User::all();
        return view('measurements.edit', compact('measurement', 'users'));
    }

    // Update an existing measurement
    public function update(Request $request, Measurement $measurement)
    {
        $validated = $request->validate([
            'user_id'              => 'required|exists:users,id',
            'weight'               => 'nullable|numeric',
            'waist_circumference'  => 'nullable|numeric',
            'hip_circumference'    => 'nullable|numeric',
            'chest_circumference'  => 'nullable|numeric',
            'shoulder_circumference'=> 'nullable|numeric',
            'thigh_circumference'  => 'nullable|numeric',
            'height'               => 'nullable|numeric',
            'body_fat_percentage'  => 'nullable|numeric',
            'date'                 => 'required|date',
        ]);

        $measurement->update($validated);

        return redirect()->route('measurements.index')->with('success', 'Measurement updated successfully.');
    }

    // Delete a measurement
    public function destroy(Measurement $measurement)
    {
        $measurement->delete();

        return redirect()->route('measurements.index')->with('success', 'Measurement deleted successfully.');
    }
}
