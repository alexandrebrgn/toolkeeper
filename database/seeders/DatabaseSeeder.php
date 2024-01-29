<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RolesAndPermissionsSeeder::class,
            CategorySeeder::class,
            DatacategorySeeder::class,
            ToolSeeder::class,
            TagSeeder::class,
            OperationSeeder::class,
            DatatoolSeeder::class,
        ]);
    }
}
