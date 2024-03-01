<?php

namespace Database\Factories;

use App\Models\Operation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Operation>
 */
class OperationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=> rand(2, 4),
            'date' => fake()->dateTimeBetween('-2 years', now(), null),
            'toDoDate' => fake()->dateTimeBetween('-2 years', now(), null),
            'report' => fake()->name,
            'tool_id' => rand(1, 5),
        ];
    }
}
