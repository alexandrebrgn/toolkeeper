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
        $roleManager = Role::create(['name' => 'toolkeeper-manager','guard_name' => 'api']);
        $roleAdmin = Role::create(['name' =>'toolkeeper-admin','guard_name' => 'api']);

        // Create permissions
            // On Tool model
        $permissionCreateTool = Permission::create(['name' => 'create-tool','guard_name' => 'api']);
        $permissionReadTool = Permission::create(['name' => 'read-tool','guard_name' => 'api']);
        $permissionReadOperatorTool = Permission::create(['name' => 'read-tool-as-operator','guard_name' => 'api']);
        $permissionReadManagerTool = Permission::create(['name' => 'read-tool-as-manager','guard_name' => 'api']);
        $permissionUpdateTool = Permission::create(['name' => 'update-tool','guard_name' => 'api']);
        $permissionDeleteTool = Permission::create(['name' => 'delete-tool','guard_name' => 'api']);
            // On Operation model
        $permissionCreateOperation = Permission::create(['name' => 'create-operation','guard_name' => 'api']);
        $permissionReadOperation = Permission::create(['name' => 'read-operation','guard_name' => 'api']);
        $permissionReadOperatorOperation = Permission::create(['name' => 'read-operation-as-operator','guard_name' => 'api']);
        $permissionReadManagerOperation = Permission::create(['name' => 'read-operation-as-manager','guard_name' => 'api']);
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
            $permissionReadTool, $permissionUpdateTool,
            // Opération
            $permissionUpdateOperation, $permissionReadOperatorOperation, $permissionReadOperation,
            // Category
            $permissionReadCategory
        ]);

        $roleManager->givePermissionTo([
            // Tool
            $permissionReadTool, $permissionCreateTool, $permissionUpdateTool, $permissionDeleteTool,
            // Operation
            $permissionReadManagerOperation, $permissionCreateOperation, $permissionUpdateOperation, $permissionDeleteOperation, $permissionReadOperation,
            // Category
            $permissionReadCategory, $permissionCreateCategory, $permissionUpdateCategory, $permissionDeleteCategory,
        ]);

        User::factory()->create([
            'firstName' => 'Gad',
            'lastName' => 'El Maleh',
            'email' => 'gad.elmaleh@toolkeeper.fr',
            'password' => '12345678'
        ])->assignRole($roleManager);

        User::factory()->create([
            'firstName' => 'Alexandre',
            'lastName' => 'Bourguignon ',
            'email' => 'operator.tk@toolkeeper.fr',
            'isOperator' => 1,
            'password' => '12345678'
        ])->assignRole($roleOperator);

        User::factory()->create([
            'firstName' => 'Gérard',
            'lastName' => 'Dubois',
            'email' => 'operator.1@toolkeeper.fr',
            'isOperator' => 1,
            'password' => '12345678'
        ])->assignRole($roleOperator);

        User::factory()->create([
            'firstName' => 'Géraldinette',
            'lastName' => 'Pied',
            'email' => 'rubt88@example.net',
            'isOperator' => 1,
            'password' => 'consecteur'
        ])->assignRole($roleOperator);
    }
}
