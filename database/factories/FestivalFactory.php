<?php

namespace Database\Factories;

use App\Models\festival;
use App\Models\Bus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**

 */
class FestivalFactory extends Factory
{
    protected $model = \App\Models\Festival::class; // Model ophalen

    public function definition()
    {
        // random aankomst en vertrek tijden
        $start_time = Carbon::now()->addDays(rand(-60, 60)) // random dag vanaf nu +60 -60 dagen
        ->addHours(rand(0, 23)); // Random hour between 0 and 23
        $end_time = $start_time->copy()->addHours(rand(1, 12)); // aankomst binnen 1 en 12 uur van vertrek

        $festival_name = $this->faker->company();
        return [
            'Festival_Name' => $festival_name,
            'Start_Time' => $start_time,
            'End_Time' => $end_time,
            'Available_Buses' => 0,
        ];
    }
    public function withbuses($busCount = null)
    {
        return $this->afterCreating(function ($festival) use ($busCount) {
            // maak gerelateerde bussen
            $buses = Bus::factory()->count($busCount ?? rand(1, 10))->create([
                'festival_id' => $festival->id,
            ]);
//1,10 is aantal bussen
            // update beschukbare bussen
            $festival->update([
                'Available_Buses' => $buses->count(),
            ]);
        });
    }
}

