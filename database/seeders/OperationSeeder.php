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
        Operation::factory()->create([
            'date' => fake()->date("2023-12-24-10-21-53"),
            'report' => "Circuit défectueux réparé",
            'user_id' => 1,
            'tool_id' => 1
        ]);
    }
}
