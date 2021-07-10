<?php

namespace Database\Factories\Equipment;

use App\Models\Equipment\Equipment;
use App\Models\Equipment\Type;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = Type::all()->pluck('id')->toArray();
        return [
            'model' => 'Какое-то сложное оборудование ' . $this->faker->randomNumber(2),
            'serial_number' => $this->faker->randomNumber(9),
            'type_id' => $this->faker->randomElement($types)
        ];
    }
}
