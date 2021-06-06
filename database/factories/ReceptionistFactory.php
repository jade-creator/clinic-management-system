<?php

namespace Database\Factories;

use App\Models\Receptionist;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReceptionistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Receptionist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function() {
                return User::factory()->create([ 'role_id' => 3 ])->id;
            }
        ];
    }
}
