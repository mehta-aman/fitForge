<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseSeeder extends Seeder
{
    public function run()
    {
        DB::table('exercises')->insert([
            // 🟥 Chest (Push)
            ['name' => 'Barbell Bench Press', 'category' => 'push', 'muscle_group' => 'chest', 'equipment' => 'barbell', 'difficulty' => 'beginner', 'duration' => '8-12 reps', 'description' => 'Lie flat on bench, lower barbell to chest, and press upward.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Incline Barbell Bench Press', 'category' => 'push', 'muscle_group' => 'chest', 'equipment' => 'barbell', 'difficulty' => 'intermediate', 'duration' => '8-12 reps', 'description' => 'Press barbell on an incline bench to target upper chest.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Decline Barbell Bench Press', 'category' => 'push', 'muscle_group' => 'chest', 'equipment' => 'barbell', 'difficulty' => 'intermediate', 'duration' => '8-12 reps', 'description' => 'Press barbell on decline bench to target lower chest.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Dumbbell Bench Press', 'category' => 'push', 'muscle_group' => 'chest', 'equipment' => 'dumbbell', 'difficulty' => 'beginner', 'duration' => '8-12 reps', 'description' => 'Press dumbbells on flat bench for chest activation.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Incline Dumbbell Press', 'category' => 'push', 'muscle_group' => 'chest', 'equipment' => 'dumbbell', 'difficulty' => 'intermediate', 'duration' => '8-12 reps', 'description' => 'Incline dumbbell press for upper chest.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Decline Dumbbell Press', 'category' => 'push', 'muscle_group' => 'chest', 'equipment' => 'dumbbell', 'difficulty' => 'intermediate', 'duration' => '8-12 reps', 'description' => 'Decline dumbbell press for lower chest.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Chest Press Machine', 'category' => 'push', 'muscle_group' => 'chest', 'equipment' => 'machine', 'difficulty' => 'beginner', 'duration' => '10-12 reps', 'description' => 'Seated machine chest press.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Incline Machine Press', 'category' => 'push', 'muscle_group' => 'chest', 'equipment' => 'machine', 'difficulty' => 'beginner', 'duration' => '10-12 reps', 'description' => 'Incline chest press machine.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Cable Fly (High)', 'category' => 'push', 'muscle_group' => 'chest', 'equipment' => 'cable', 'difficulty' => 'intermediate', 'duration' => '12-15 reps', 'description' => 'High cable fly for chest isolation.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Cable Fly (Mid)', 'category' => 'push', 'muscle_group' => 'chest', 'equipment' => 'cable', 'difficulty' => 'intermediate', 'duration' => '12-15 reps', 'description' => 'Mid-level cable fly for chest.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Cable Fly (Low)', 'category' => 'push', 'muscle_group' => 'chest', 'equipment' => 'cable', 'difficulty' => 'intermediate', 'duration' => '12-15 reps', 'description' => 'Low cable fly for chest.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Push-up', 'category' => 'push', 'muscle_group' => 'chest', 'equipment' => 'bodyweight', 'difficulty' => 'beginner', 'duration' => '12-20 reps', 'description' => 'Standard push-up for chest and triceps.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Incline Push-up', 'category' => 'push', 'muscle_group' => 'chest', 'equipment' => 'bodyweight', 'difficulty' => 'beginner', 'duration' => '12-20 reps', 'description' => 'Incline push-up variation.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Decline Push-up', 'category' => 'push', 'muscle_group' => 'chest', 'equipment' => 'bodyweight', 'difficulty' => 'intermediate', 'duration' => '12-20 reps', 'description' => 'Decline push-up variation.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Diamond Push-up', 'category' => 'push', 'muscle_group' => 'chest', 'equipment' => 'bodyweight', 'difficulty' => 'intermediate', 'duration' => '12-20 reps', 'description' => 'Close-grip push-up for triceps and chest.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Wide Push-up', 'category' => 'push', 'muscle_group' => 'chest', 'equipment' => 'bodyweight', 'difficulty' => 'beginner', 'duration' => '12-20 reps', 'description' => 'Wide push-up for chest activation.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Pec Deck Machine Fly', 'category' => 'push', 'muscle_group' => 'chest', 'equipment' => 'machine', 'difficulty' => 'beginner', 'duration' => '12-15 reps', 'description' => 'Pec deck machine chest fly.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Dumbbell Fly', 'category' => 'push', 'muscle_group' => 'chest', 'equipment' => 'dumbbell', 'difficulty' => 'intermediate', 'duration' => '12-15 reps', 'description' => 'Dumbbell fly on flat bench.', 'media_url' => null, 'is_active' => true],

            // 🟦 Back (Pull)
            ['name' => 'Conventional Deadlift', 'category' => 'pull', 'muscle_group' => 'back', 'equipment' => 'barbell', 'difficulty' => 'advanced', 'duration' => '5-8 reps', 'description' => 'Standard barbell deadlift for full back and posterior chain.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Sumo Deadlift', 'category' => 'pull', 'muscle_group' => 'back', 'equipment' => 'barbell', 'difficulty' => 'advanced', 'duration' => '5-8 reps', 'description' => 'Wide stance deadlift for glutes and hamstrings.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Romanian Deadlift', 'category' => 'pull', 'muscle_group' => 'hamstrings', 'equipment' => 'barbell', 'difficulty' => 'intermediate', 'duration' => '8-12 reps', 'description' => 'Barbell RDL for hamstrings and glutes.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Barbell Row', 'category' => 'pull', 'muscle_group' => 'back', 'equipment' => 'barbell', 'difficulty' => 'intermediate', 'duration' => '8-12 reps', 'description' => 'Barbell bent-over row for lats and traps.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Dumbbell Row', 'category' => 'pull', 'muscle_group' => 'back', 'equipment' => 'dumbbell', 'difficulty' => 'beginner', 'duration' => '10-12 reps', 'description' => 'Single-arm dumbbell row for lats and mid-back.', 'media_url' => null, 'is_active' => true],
            ['name' => 'T-Bar Row', 'category' => 'pull', 'muscle_group' => 'back', 'equipment' => 'machine', 'difficulty' => 'intermediate', 'duration' => '8-12 reps', 'description' => 'T-bar machine row for mid-back.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Seated Cable Row', 'category' => 'pull', 'muscle_group' => 'back', 'equipment' => 'cable', 'difficulty' => 'beginner', 'duration' => '10-15 reps', 'description' => 'Seated cable rows with neutral grip for mid-back.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Lat Pulldown', 'category' => 'pull', 'muscle_group' => 'lats', 'equipment' => 'cable', 'difficulty' => 'beginner', 'duration' => '10-12 reps', 'description' => 'Wide grip pulldown to target lat muscles.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Pull-Up', 'category' => 'pull', 'muscle_group' => 'lats', 'equipment' => 'bodyweight', 'difficulty' => 'intermediate', 'duration' => '6-12 reps', 'description' => 'Bodyweight pull-ups for lats and arms.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Chin-Up', 'category' => 'pull', 'muscle_group' => 'biceps', 'equipment' => 'bodyweight', 'difficulty' => 'intermediate', 'duration' => '6-12 reps', 'description' => 'Underhand grip chin-ups for lats and biceps.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Face Pull', 'category' => 'pull', 'muscle_group' => 'rear delts', 'equipment' => 'cable', 'difficulty' => 'beginner', 'duration' => '12-15 reps', 'description' => 'Cable face pull for rear delts and traps.', 'media_url' => null, 'is_active' => true],


             // 🟧 Shoulders
            ['name' => 'Overhead Barbell Press', 'category' => 'push', 'muscle_group' => 'shoulders', 'equipment' => 'barbell', 'difficulty' => 'intermediate', 'duration' => '6-10 reps', 'description' => 'Barbell press for deltoids and triceps.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Dumbbell Shoulder Press', 'category' => 'push', 'muscle_group' => 'shoulders', 'equipment' => 'dumbbell', 'difficulty' => 'beginner', 'duration' => '8-12 reps', 'description' => 'Dumbbell press for shoulders and triceps.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Arnold Press', 'category' => 'push', 'muscle_group' => 'shoulders', 'equipment' => 'dumbbell', 'difficulty' => 'intermediate', 'duration' => '8-12 reps', 'description' => 'Arnold Schwarzenegger’s variation of shoulder press.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Lateral Raise', 'category' => 'isolation', 'muscle_group' => 'shoulders', 'equipment' => 'dumbbell', 'difficulty' => 'beginner', 'duration' => '12-15 reps', 'description' => 'Dumbbell lateral raises for medial delts.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Front Raise', 'category' => 'isolation', 'muscle_group' => 'shoulders', 'equipment' => 'dumbbell', 'difficulty' => 'beginner', 'duration' => '12-15 reps', 'description' => 'Dumbbell front raises for anterior delts.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Rear Delt Fly (Machine)', 'category' => 'isolation', 'muscle_group' => 'rear delts', 'equipment' => 'machine', 'difficulty' => 'beginner', 'duration' => '12-15 reps', 'description' => 'Reverse pec-deck for rear delts.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Rear Delt Fly (Dumbbell)', 'category' => 'isolation', 'muscle_group' => 'rear delts', 'equipment' => 'dumbbell', 'difficulty' => 'beginner', 'duration' => '12-15 reps', 'description' => 'Dumbbell rear delt fly.', 'media_url' => null, 'is_active' => true],


            // 🟩 Arms
            ['name' => 'Barbell Curl', 'category' => 'isolation', 'muscle_group' => 'biceps', 'equipment' => 'barbell', 'difficulty' => 'beginner', 'duration' => '8-12 reps', 'description' => 'Barbell curl for biceps growth.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Dumbbell Curl', 'category' => 'isolation', 'muscle_group' => 'biceps', 'equipment' => 'dumbbell', 'difficulty' => 'beginner', 'duration' => '8-12 reps', 'description' => 'Alternating dumbbell curls.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Preacher Curl', 'category' => 'isolation', 'muscle_group' => 'biceps', 'equipment' => 'machine', 'difficulty' => 'beginner', 'duration' => '10-12 reps', 'description' => 'Preacher bench curls for peak contraction.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Hammer Curl', 'category' => 'isolation', 'muscle_group' => 'biceps/forearms', 'equipment' => 'dumbbell', 'difficulty' => 'beginner', 'duration' => '10-12 reps', 'description' => 'Neutral grip curl for biceps and forearms.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Skull Crusher', 'category' => 'isolation', 'muscle_group' => 'triceps', 'equipment' => 'barbell', 'difficulty' => 'intermediate', 'duration' => '8-12 reps', 'description' => 'Lying barbell extensions for triceps.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Tricep Pushdown', 'category' => 'isolation', 'muscle_group' => 'triceps', 'equipment' => 'cable', 'difficulty' => 'beginner', 'duration' => '10-15 reps', 'description' => 'Cable pushdowns for triceps.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Overhead Dumbbell Extension', 'category' => 'isolation', 'muscle_group' => 'triceps', 'equipment' => 'dumbbell', 'difficulty' => 'beginner', 'duration' => '10-12 reps', 'description' => 'Dumbbell overhead tricep extension.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Tricep Kickbacks', 'category' => 'isolation', 'muscle_group' => 'triceps', 'equipment' => 'dumbbell', 'difficulty' => 'beginner', 'duration' => '10-12 reps', 'description' => 'Dumbbell kickbacks for triceps.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Tricep Dips', 'category' => 'isolation', 'muscle_group' => 'triceps', 'equipment' => 'dumbbell', 'difficulty' => 'beginner', 'duration' => '10-12 reps', 'description' => 'Dumbbell tricep dips.', 'media_url' => null, 'is_active' => true],
            

            // 🟪 Legs
            ['name' => 'Back Squat', 'category' => 'compound', 'muscle_group' => 'legs', 'equipment' => 'barbell', 'difficulty' => 'intermediate', 'duration' => '5-10 reps', 'description' => 'Barbell squat for quads, glutes, hamstrings.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Front Squat', 'category' => 'compound', 'muscle_group' => 'legs', 'equipment' => 'barbell', 'difficulty' => 'advanced', 'duration' => '5-8 reps', 'description' => 'Front-loaded squat for quads and core.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Leg Press', 'category' => 'compound', 'muscle_group' => 'legs', 'equipment' => 'machine', 'difficulty' => 'beginner', 'duration' => '10-15 reps', 'description' => 'Machine leg press for overall legs.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Walking Lunges', 'category' => 'compound', 'muscle_group' => 'legs', 'equipment' => 'dumbbell', 'difficulty' => 'intermediate', 'duration' => '12-16 steps', 'description' => 'Dumbbell lunges for quads and glutes.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Bulgarian Split Squat', 'category' => 'compound', 'muscle_group' => 'legs', 'equipment' => 'dumbbell', 'difficulty' => 'intermediate', 'duration' => '8-12 reps', 'description' => 'Single-leg squat with rear foot elevated.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Leg Curl (Machine)', 'category' => 'isolation', 'muscle_group' => 'hamstrings', 'equipment' => 'machine', 'difficulty' => 'beginner', 'duration' => '12-15 reps', 'description' => 'Seated or lying machine curls for hamstrings.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Leg Extension (Machine)', 'category' => 'isolation', 'muscle_group' => 'quads', 'equipment' => 'machine', 'difficulty' => 'beginner', 'duration' => '12-15 reps', 'description' => 'Leg extension to isolate quadriceps.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Standing Calf Raise', 'category' => 'isolation', 'muscle_group' => 'calves', 'equipment' => 'machine', 'difficulty' => 'beginner', 'duration' => '12-20 reps', 'description' => 'Machine calf raises.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Seated Calf Raise', 'category' => 'isolation', 'muscle_group' => 'calves', 'equipment' => 'machine', 'difficulty' => 'beginner', 'duration' => '15-20 reps', 'description' => 'Seated calf machine raises for soleus muscle.', 'media_url' => null, 'is_active' => true],


            // 🟨 Core
            ['name' => 'Plank', 'category' => 'core', 'muscle_group' => 'abs', 'equipment' => 'bodyweight', 'difficulty' => 'beginner', 'duration' => '30-60 sec', 'description' => 'Static plank hold for core stability.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Crunches', 'category' => 'core', 'muscle_group' => 'abs', 'equipment' => 'bodyweight', 'difficulty' => 'beginner', 'duration' => '15-20 reps', 'description' => 'Basic crunches for abdominal muscles.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Hanging Leg Raise', 'category' => 'core', 'muscle_group' => 'abs', 'equipment' => 'bar', 'difficulty' => 'intermediate', 'duration' => '10-15 reps', 'description' => 'Hanging raises for lower abs.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Russian Twist', 'category' => 'core', 'muscle_group' => 'obliques', 'equipment' => 'bodyweight', 'difficulty' => 'beginner', 'duration' => '20 reps (10 per side)', 'description' => 'Oblique twists for core rotation.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Cable Woodchopper', 'category' => 'core', 'muscle_group' => 'obliques', 'equipment' => 'cable', 'difficulty' => 'intermediate', 'duration' => '12-15 reps', 'description' => 'Rotational cable exercise for obliques.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Side Plank', 'category' => 'core', 'muscle_group' => 'abs', 'equipment' => 'bodyweight', 'difficulty' => 'intermediate', 'duration' => '30-60 sec', 'description' => 'Plank with side movement for core stability.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Russian Twist', 'category' => 'core', 'muscle_group' => 'obliques', 'equipment' => 'bodyweight', 'difficulty' => 'intermediate', 'duration' => '20 reps (10 per side)', 'description' => 'Oblique twists for core rotation.', 'media_url' => null, 'is_active' => true],
            

            // 🟧 Cardio
            ['name' => 'Treadmill', 'category' => 'cardio', 'muscle_group' => 'cardio', 'equipment' => 'machine', 'difficulty' => 'beginner', 'duration' => '30-60 min', 'description' => 'Light running for cardiovascular fitness.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Jump Rope', 'category' => 'cardio', 'muscle_group' => 'cardio', 'equipment' => 'bodyweight', 'difficulty' => 'beginner', 'duration' => '10-15 min', 'description' => 'Dynamic jump rope for cardio and core.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Running', 'category' => 'cardio', 'muscle_group' => 'cardio', 'equipment' => 'bodyweight', 'difficulty' => 'beginner', 'duration' => '30-60 min', 'description' => 'Light running for cardiovascular fitness.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Cycling', 'category' => 'cardio', 'muscle_group' => 'cardio', 'equipment' => 'bike', 'difficulty' => 'intermediate', 'duration' => '30-60 min', 'description' => 'Moderate cycling for cardiovascular fitness.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Swimming', 'category' => 'cardio', 'muscle_group' => 'cardio', 'equipment' => 'pool', 'difficulty' => 'advanced', 'duration' => '30-60 min', 'description' => 'Intense swimming for cardiovascular fitness.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Rowing', 'category' => 'cardio', 'muscle_group' => 'cardio', 'equipment' => 'machine', 'difficulty' => 'intermediate', 'duration' => '30-60 min', 'description' => 'Rowing for cardiovascular fitness.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Elliptical Trainer', 'category' => 'cardio', 'muscle_group' => 'cardio', 'equipment' => 'machine', 'difficulty' => 'intermediate', 'duration' => '30-60 min', 'description' => 'Elliptical trainer for cardiovascular fitness.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Stairmaster', 'category' => 'cardio', 'muscle_group' => 'cardio', 'equipment' => 'machine', 'difficulty' => 'advanced', 'duration' => '30-60 min', 'description' => 'Stairmaster for cardiovascular fitness.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Bike', 'category' => 'cardio', 'muscle_group' => 'cardio', 'equipment' => 'bike', 'difficulty' => 'advanced', 'duration' => '30-60 min', 'description' => 'Intense biking for cardiovascular fitness.', 'media_url' => null, 'is_active' => true],
            ['name' => 'Rowing', 'category' => 'cardio', 'muscle_group' => 'cardio', 'equipment' => 'machine', 'difficulty' => 'intermediate', 'duration' => '30-60 min', 'description' => 'Rowing for cardiovascular fitness.', 'media_url' => null, 'is_active' => true],
        ]);
    }
}

