<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'scheduled_at' => $this->faker->dateTime(),
            'remarks' => $this->faker->text(),
            'patient_id' => Patient::all()->random()->id,
            'doctor_id' => Doctor::all()->random()->id,
            'status_id' => Status::all()->random()->id
        ];
    }
}
