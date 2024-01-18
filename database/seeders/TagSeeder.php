<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::factory()->create([
            'label' => "Maintain",
            'tool_id' => 1
        ]);
        Tag::factory()->create([
            'label' => "Maintained",
            'tool_id' => null
        ]);
    }
}
