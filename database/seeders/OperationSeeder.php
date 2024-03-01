<?php

namespace Database\Seeders;

use App\Models\Operation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Operation::factory()->count(20)->create();
        Operation::factory()->create([
            'date' => fake()->date("Y-m-d H-i-s"),
            'report' => 'Intervention sur l\'extincteur n°45, aucun problèmes à ce jour, l\'extincteur fonctionne parfaitement, si c\'est aussi long c\'est pour tester le mobile voila voila c\'est long c\'est pas encore fini voila',
            'tool_id' => 2
        ]);
        Operation::factory()->create([
            'date' => null,
            'toDoDate' => fake()->dateTimeBetween(now(), '+1 year', null),
            'report' => '',
            'user_id' => 1,
            'tool_id' => 2
        ]);
        Operation::factory()->create([
            'date' => null,
            'toDoDate' => fake()->dateTimeBetween(now(), '+1 year', null),
            'report' => '',
            'user_id' => 1,
            'tool_id' => 1
        ]);
        Operation::factory()->create([
            'date' => null,
            'toDoDate' => fake()->dateTimeBetween(now(), '+1 year', null),
            'report' => '',
            'user_id' => 1,
            'tool_id' => 3
        ]);
        Operation::factory()->create([
            'date' => null,
            'toDoDate' => fake()->dateTimeBetween(now(), '+1 year', null),
            'report' => '',
            'user_id' => 1,
            'tool_id' => 4
        ]);
        Operation::factory()->create([
            'date' => null,
            'toDoDate' => fake()->dateTimeBetween(now(), '+1 year', null),
            'report' => '',
            'user_id' => 1,
            'tool_id' => 5
        ]);
        Operation::factory()->create([
            'date' => null,
            'toDoDate' => fake()->dateTimeBetween(now(), '+1 year', null),
            'report' => '',
            'user_id' => 1,
            'tool_id' => 6
        ]);
//        Operation::factory()->create([
//            'user_id' => 1,
//            'tool_id' => 7
//        ]);
//        Operation::factory()->create([
//            'user_id' => 1,
//            'tool_id' => 8
//        ]);

    }
}
