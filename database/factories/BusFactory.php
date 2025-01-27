<?php

namespace Database\Factories;

use App\Models\festival;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class BusFactory extends Factory
{
    protected $model = \App\Models\Bus::class; // Ensure the model is correctly referenced

    public function definition()
    {
        // random aankomst en vertrektijd
        $leavesAt = Carbon::now()->addDays(rand(-60, 60)) // random dag vanaf nu + - 30 dagen
        ->addHours(rand(0, 23)); // random tijd tussen 0 en 23 uur
        $arrivesAt = $leavesAt->copy()->addHours(rand(1, 12)); // aankomst tijd 1 tot 12 uur na vertrek
        $ticket_price = rand(1, 15);
        return [
            'Leaves_at' => $leavesAt,
            'Arrives_at' => $arrivesAt,
            'ticket_price' => $ticket_price,
            'festival_id' => festival::inRandomOrder()->first()->id ?? null, // link aan festival.
        ];
    }
}
