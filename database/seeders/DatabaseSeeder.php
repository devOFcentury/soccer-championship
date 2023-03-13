<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Championnat;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Championnat::factory()->create([
            'nom' => 'La Liga',
        ]);
        Championnat::factory()->create([
            'nom' => 'Bundesliga',
        ]);
        Championnat::factory()->create([
            'nom' => 'Serie A',
        ]);
        Championnat::factory()->create([
            'nom' => 'Ligue 1',
        ]);
    }
}
