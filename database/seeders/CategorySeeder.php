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
            'name' => "Extincteur",
            'isLegal' => 1,
            'icon' => 'fa-solid fa-fire-extinguisher'
        ]);
        Category::factory()->create([
            'name' => "Climatiseur",
            'isLegal' => 0,
            'icon' => 'fa-solid fa-spray-can-sparkles'
        ]);
        Category::factory()->create([
            'name' => "Véhicule",
            'isLegal' => 1,
            'icon' => 'fa-solid fa-car'
        ]);
    }
}
