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
           'name' => "73",
            'serialId' => "2024379413",
            'isActive' => true,
            'localisation' => "Bâtiment B",
            'dateNextOperation' => fake()->date("2024-12-24 10:20:20"),
            'toDo' => false,
            'category_id' => 1,
        ]);

        Tool::factory()->create([
            'name' => "2",
            'serialId' => "2024379413",
            'isActive' => true,
            'localisation' => "Bâtiment A",
            'dateNextOperation' => fake()->date("2024-12-24 10:20:20"),
            'toDo' => false,
            'category_id' => 2,
        ]);

        Tool::factory()->create([
            'name' => "31",
            'serialId' => "798465214",
            'isActive' => true,
            'localisation' => "Bâtiment C",
            'dateNextOperation' => fake()->date("2022-12-24 10:20:20"),
            'toDo' => false,
            'category_id' => 3,
        ]);

        Tool::factory()->create([
            'name' => "115",
            'serialId' => "1234567852",
            'isActive' => true,
            'localisation' => "Bâtiment F",
            'dateNextOperation' => fake()->date("2024-12-24 10:20:20"),
            'toDo' => false,
            'category_id' => 3,
        ]);

        Tool::factory()->create([
            'name' => "5",
            'serialId' => "9845321595",
            'isActive' => true,
            'localisation' => "Bâtiment B",
            'dateNextOperation' => fake()->date("2024-05-24 10:20:20"),
            'toDo' => false,
            'category_id' => 2,
        ]);

        Tool::factory()->create([
            'name' => "98",
            'serialId' => "87651245",
            'isActive' => true,
            'localisation' => "Bâtiment E",
            'dateNextOperation' => fake()->date("2024-06-24 10:20:20"),
            'toDo' => false,
            'category_id' => 1,
        ]);
    }
}
