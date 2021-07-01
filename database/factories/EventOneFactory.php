<?php

namespace Database\Factories;

use App\Models\EventOne;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventOneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EventOne::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'phone'=>$this->faker->unique()->phoneNumber,
            'date_of_birth'=> $this->faker->date('Y-m-d', '2003-12-31'),
            'ip_address'=> $this->faker->ipv4,


        ];
    }
}
