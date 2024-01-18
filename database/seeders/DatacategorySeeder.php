<?php

namespace Database\Seeders;

use App\Models\Datacategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatacategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Datacategory::factory()->create([
            'key' => "exempleKey",
            'label' => "typeFeu",
            'type' => "feu",
            'values' => "essence, circuit électriques",
            'category_id' => 1
        ]);
    }
}
