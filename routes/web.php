<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\WorkoutExerciseController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\StreakController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\MeasurementController;
use App\Http\Controllers\ProgressLogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BodyConditionController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
});

Route::get('/custom-logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('custom.logout');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/body-condition', [BodyConditionController::class, 'index'])->name('body-condition.index');
Route::get('/body-condition/edit', [BodyConditionController::class, 'edit'])->name('body-condition.edit');
Route::post('/body-condition', [BodyConditionController::class, 'store'])->name('body-condition.store');
Route::delete('/body-condition/reset', [BodyConditionController::class, 'reset'])->name('body-condition.reset');

 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/settings', function () {
        return view('admin.settings');
    })->name('admin.settings');
});

Route::resource('users', UserController::class);
Route::resource('exercises', ExerciseController::class);
Route::resource('goals', GoalController::class);
Route::resource('measurements', MeasurementController::class);
Route::resource('progress_logs', ProgressLogController::class);
Route::resource('reminders', ReminderController::class);
Route::resource('streaks', StreakController::class);
Route::resource('workouts', WorkoutController::class);
Route::resource('workout-exercises', WorkoutExerciseController::class);
Route::resource('tasks', TaskController::class)->only(['index', 'store', 'update', 'destroy']);

Route::get('exercises/{exercise}/details', [ExerciseController::class, 'getExerciseDetails'])->name('exercises.details');

require __DIR__.'/auth.php';
