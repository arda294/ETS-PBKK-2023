<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalRecord>
 */
class MedicalRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $table->id();
        //     $table->text('health_condition');
        //     $table->float('temperature');
        //     $table->string('prescription_img')->nullable();
        //     $table->foreignId('doctor_id')->constrained();
        //     $table->foreignId('patient_id')->constrained();
        //     $table->timestamps();

        return [
            'health_condition' => fake('id_ID')->realText(),
            'temperature' => fake('id_ID')->randomFloat(2, 35, 45.5),
            'prescription_img' => fake('id_ID')->imageUrl(),
            'doctor_id' => fake()->randomElement(Doctor::pluck('id', 'id')->toArray()),
            'patient_id' => fake()->randomElement(Patient::pluck('id', 'id')->toArray()),
        ];
    }
}
