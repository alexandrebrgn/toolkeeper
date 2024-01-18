<?php

namespace Database\Seeders;

use App\Models\Maintenance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Maintenance::factory()->create([
            'date' => fake()->date("2023-12-24-10-21-53"),
            'report' => "Circuit défectueux réparé",
            'user_id' => 1,
            'tool_id' => 1
        ]);
    }
}
