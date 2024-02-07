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
            'user_id'=> rand(1,2),
            'date' => fake()->date("Y-m-d H-i-s"),
            'toDoDate' => fake()->date("Y-m-d H-i-s"),
            'report' => "Structure plastique",
            'tool_id' => rand(1, 5),
        ];
    }
}
