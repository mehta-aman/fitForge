<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Exercise;

class ImportGlobalExercises extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:global-exercises';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import exercises from the Wger global exercise API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Fetching exercises and lookup tables from Wger API...');
        $categories = collect(Http::get('https://wger.de/api/v2/exercisecategory/?limit=100')->json('results'));
        $muscles = collect(Http::get('https://wger.de/api/v2/muscle/?limit=100')->json('results'));
        $equipment = collect(Http::get('https://wger.de/api/v2/equipment/?limit=100')->json('results'));

        // Helper functions to map IDs to names
        $categoryMap = $categories->mapWithKeys(fn($c) => [$c['id'] => $c['name']]);
        $muscleMap = $muscles->mapWithKeys(fn($m) => [$m['id'] => $m['name_en'] ?: $m['name']]);
        $equipmentMap = $equipment->mapWithKeys(fn($e) => [$e['id'] => $e['name']]);

        $response = Http::get('https://wger.de/api/v2/exercise/?language=2&limit=1000');
        $exercises = $response->json('results');

        foreach ($exercises as $ex) {
            if (empty($ex['name'])) {
                $this->warn('Skipped: missing name for ID ' . ($ex['id'] ?? 'N/A'));
                continue;
            }
            // Map category
            $categoryName = $categoryMap[$ex['category']] ?? null;
            // Map primary muscle group (first muscle)
            $muscleName = null;
            if (!empty($ex['muscles'])) {
                $muscleName = $muscleMap[$ex['muscles'][0]] ?? null;
            }
            // Map equipment (first equipment)
            $equipmentName = null;
            if (!empty($ex['equipment'])) {
                $equipmentName = $equipmentMap[$ex['equipment'][0]] ?? null;
            }
            $exercise = Exercise::updateOrCreate(
                ['external_id' => $ex['id']],
                [
                    'name' => $ex['name'],
                    'description' => $ex['description'] ?? '',
                    'category' => $categoryName,
                    'muscle_group' => $muscleName,
                    'equipment' => $equipmentName,
                    'difficulty' => $ex['difficulty'] ?? null,
                ]
            );
            $this->info('Saved: ' . $exercise->name . ' (ID: ' . $ex['id'] . ')');
        }
        $this->info('Global exercises imported!');
    }
}
