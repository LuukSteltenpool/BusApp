<?php

namespace Database\Seeders;

use App\Models\bus;
use App\Models\festival;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Festival::factory(10)->withbuses()->create();// festival
        Bus::factory()->count(20)->create();


    }

}

