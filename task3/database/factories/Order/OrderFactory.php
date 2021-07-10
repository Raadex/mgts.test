<?php

namespace Database\Factories\Order;

use App\Models\Equipment\Equipment;
use App\Models\Model;
use App\Models\Order\Order;
use App\Models\Order\Status;
use App\Models\Order\Type;
use App\Models\Tariff;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $statuses = Status::all()->pluck('id')->toArray();
        $types = Type::all()->pluck('id')->toArray();
        return [
            'number' => uniqid(),
            'phone' => $this->faker->phoneNumber(),
            'status_id' => $this->faker->randomElement($statuses),
            'type_id' => $this->faker->randomElement($types),
            'tariff_id' => Tariff::factory()->create()->id,
            'equipment_id' => Equipment::factory()->create()->id
        ];
    }
}
