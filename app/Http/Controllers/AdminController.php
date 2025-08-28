<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Workout;
use App\Models\Goal;
use App\Models\Streak;
use App\Models\Reminder;
use App\Models\ProgressLog;
use App\Models\User;
use App\Models\Exercise;
use App\Models\Task;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            // dd(Auth::user());
            $usertype = Auth::user()->role;
            if ($usertype == 'user') {
                $user = Auth::user();

                $workoutsCount = $user->workouts()->count();
                $goalsCount = $user->goals()->count();
                $streaksCount = $user->streaks()->count();
                $remindersCount = $user->reminders()->count();

                $recentWorkouts = $user->workouts()->latest()->take(5)->get();

                $progressData = ProgressLog::where('user_id', $user->id)
                    ->orderBy('log_date')
                    ->get();

                return view('home.index', compact('workoutsCount', 'goalsCount', 'streaksCount', 'remindersCount', 'recentWorkouts', 'progressData'));
            } else if ($usertype == 'admin') {
                $userCount = User::count();
                $exerciseCount = Exercise::count();
                $tasks = Task::latest()->get();
                return view('admin.index', compact('userCount', 'exerciseCount', 'tasks'));
            } else {
                return redirect()->back();
            }
        }
    }
}
