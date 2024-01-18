<?php

namespace Database\Seeders;

use App\Models\Datatool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatatoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Datatool::factory()->create([
            'value' => "essence",
            'dataCategory_id' => 1,
            'tool_id' => 1
        ]);
    }
}
