<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create([
            'name' => "Extincteurs",
            'isLegal' => 1
        ]);
        Category::factory()->create([
            'name' => "Climatiseurs",
            'isLegal' => 0
        ]);
        Category::factory()->create([
            'name' => "Véhicules",
            'isLegal' => 1
        ]);
    }
}
