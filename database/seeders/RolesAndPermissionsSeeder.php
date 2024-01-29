<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles
        $roleOperator = Role::create(['name' => 'toolkeeper-operator','guard_name' => 'api']);
        $roleManager = Role::create(['name' => 'toolkeeper-purchaser','guard_name' => 'api']);
        $roleAdmin = Role::create(['name' =>'toolkeeper-admin','guard_name' => 'api']);

        // Create permissions
            // On Tool model
        $permissionCreateTool = Permission::create(['name' => 'create-tool','guard_name' => 'api']);
        $permissionReadTool = Permission::create(['name' => 'read-tool','guard_name' => 'api']);
        $permissionUpdateTool = Permission::create(['name' => 'update-tool','guard_name' => 'api']);
        $permissionDeleteTool = Permission::create(['name' => 'delete-tool','guard_name' => 'api']);
            // On Operation model
        $permissionCreateOperation = Permission::create(['name' => 'create-operation','guard_name' => 'api']);
        $permissionReadOperation = Permission::create(['name' => 'read-operation','guard_name' => 'api']);
        $permissionUpdateOperation = Permission::create(['name' => 'update-operation','guard_name' => 'api']);
        $permissionDeleteOperation = Permission::create(['name' => 'delete-operation','guard_name' => 'api']);
            // On Category model
        $permissionCreateCategory = Permission::create(['name' => 'create-category','guard_name' => 'api']);
        $permissionReadCategory = Permission::create(['name' => 'read-category','guard_name' => 'api']);
        $permissionUpdateCategory = Permission::create(['name' => 'update-category','guard_name' => 'api']);
        $permissionDeleteCategory = Permission::create(['name' => 'delete-category','guard_name' => 'api']);

        // Assign permissions to roles
        $roleOperator->givePermissionTo([
            // Tool
            // Order
            $permissionReadOperation,
            // Category
            $permissionReadCategory,
        ]);

        $roleManager->givePermissionTo([
            // Tool
            $permissionReadTool, $permissionCreateTool, $permissionUpdateTool, $permissionDeleteTool,
            // Operation
            $permissionReadOperation, $permissionCreateOperation, $permissionUpdateOperation, $permissionDeleteOperation,
            // Category
            $permissionReadCategory, $permissionCreateCategory, $permissionUpdateCategory, $permissionDeleteCategory,
        ]);

        User::factory()->create([
            'firstName' => 'Alexandre',
            'lastName' => 'Bourguignon',
            'email' => 'manager.tk@test.fr',
            'password' => '12345678'
        ])->assignRole($roleManager);

        $userOperator = User::factory()->create([
            'firstName' => 'Alexandre Bourguignon',
            'lastName' => 'Test',
            'email' => 'operator.tk@test.fr',
            'password' => '12345678'
        ])->assignRole($roleOperator);
    }
}
