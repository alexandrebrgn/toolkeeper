<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'firstName' => 'Test',
            'lastName' => 'Test',
            'email' => 'brgn.alex@test.fr',
            'password' => '12345678'
        ]);
        $this->call([
            CategorySeeder::class,
            DatacategorySeeder::class,
            ToolSeeder::class,
            TagSeeder::class,
            MaintenanceSeeder::class,
            DatatoolSeeder::class
        ]);
    }
}
