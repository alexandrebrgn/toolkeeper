<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tool::factory()->create([
           'number' => "73",
            'serialId' => "2024379413",
            'isActive' => true,
            'localisation' => "Bâtiment A",
            'dateNextOperation' => fake()->date("2024-12-24 10:20:20"),
            'toDo' => false,
            'category_id' => 1,
        ]);
    }
}
