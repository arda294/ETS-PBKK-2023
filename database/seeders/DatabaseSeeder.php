<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Doctor;
use App\Models\MedicalRecord;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Doctor::create([
            'name' => 'Dokter Hebat',
        ]);

        Doctor::create([
            'name' => 'Dokter Hebat 2',
        ]);

        Patient::create([
            'name' => 'Pasien Sakit',
        ]);

        Patient::create([
            'name' => 'Pasien Sakit 2',
        ]);

        MedicalRecord::factory()->count(5)->create();
    }
}
