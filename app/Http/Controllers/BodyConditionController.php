<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Measurement;
use App\Models\ProgressLog;
use Illuminate\Support\Facades\Auth;

class BodyConditionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $latestMeasurement = Measurement::where('user_id', $user->id)->latest()->first();
        $measurementHistory = Measurement::where('user_id', $user->id)->latest()->paginate(10);
        
        $progressData = ProgressLog::where('user_id', $user->id)
            ->whereIn('type', ['weight', 'body_fat_percentage', 'muscle_mass'])
            ->get()
            ->groupBy('type')
            ->map(function ($logs) {
                return [
                    'labels' => $logs->pluck('created_at')->map(function ($date) {
                        return $date->format('M d');
                    }),
                    'values' => $logs->pluck('value'),
                ];
            });

        return view('body-condition.index', compact('latestMeasurement', 'measurementHistory', 'progressData'));
    }

    public function edit()
    {
        $user = Auth::user();
        $latestMeasurement = Measurement::where('user_id', $user->id)->latest()->first();
        return view('body-condition.edit', compact('latestMeasurement'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'body_fat_percentage' => 'nullable|numeric',
            'muscle_mass' => 'nullable|numeric',
            'chest' => 'nullable|numeric',
            'waist' => 'nullable|numeric',
            'hips' => 'nullable|numeric',
        ]);

        $latestMeasurement = Measurement::where('user_id', $user->id)->latest()->first();
        $dataForNewMeasurement = $validatedData;

        if ($latestMeasurement) {
            foreach ($dataForNewMeasurement as $key => &$value) {
                if (is_null($value) && !is_null($latestMeasurement->$key)) {
                    $value = $latestMeasurement->$key;
                }
            }
        }

        $measurement = Measurement::create(array_merge($dataForNewMeasurement, ['user_id' => $user->id]));

        $loggableFields = [
            'weight', 'height', 'body_fat_percentage', 'muscle_mass', 'chest', 'waist', 'hips'
        ];

        foreach ($loggableFields as $field) {
            $valueToLog = $measurement->$field;
            if (!is_null($valueToLog)) {
                ProgressLog::create([
                    'user_id' => $user->id,
                    'type' => $field,
                    'value' => $valueToLog,
                    'log_date' => $measurement->created_at,
                ]);
            }
        }

        return redirect()->route('body-condition.index')->with('success', 'Body condition updated successfully.');
    }

    public function reset()
    {
        $user = Auth::user();

        Measurement::where('user_id', $user->id)->delete();
        ProgressLog::where('user_id', $user->id)->delete();

        return redirect()->route('body-condition.index')->with('success', 'Your body condition data has been reset.');
    }
}
