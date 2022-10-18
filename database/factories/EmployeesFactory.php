<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'=>$this->faker->firstName(),
            'last_name'=>$this->faker->lastName(),
            'companies_id'=>mt_rand(1,4),
            'email'=>$this->faker->freeEmail(),
            'phone'=>$this->faker->phoneNumber()
        ];
    }
}
