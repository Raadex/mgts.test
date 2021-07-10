<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $countries = ['Россия', 'Украина', 'Беларусь'];
        return [
            'country' => $this->faker->randomElement($countries),
            'region' => 'Какой-то регион ' . $this->faker->randomNumber(2) ,
            'city' => 'Какой-то город' . $this->faker->randomNumber(2),
            'street' => 'Какая-то улица' . $this->faker->randomNumber(2),
            'house' => $this->faker->randomNumber(2),
            'flat' => $this->faker->randomNumber(1)
        ];
    }
}
