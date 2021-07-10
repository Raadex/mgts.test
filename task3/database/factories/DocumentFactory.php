<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Document::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = ['Паспорт', 'Военик', 'Заграник'];
        return [
            'type' => $this->faker->randomElement($types),
            'number' => $this->faker->randomNumber(9),
            'date_of_issue' => $this->faker->dateTimeThisYear(),
            'agency' => $this->faker->address(),
        ];
    }
}
