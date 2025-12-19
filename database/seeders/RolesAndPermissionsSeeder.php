<?php

namespace Database\Seeders;

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
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Permissions
        $permissions = [
            'view dashboard',
            'edit users',
            'delete users',
            'create users',
            'manage roles',
            'manage permissions',
            'view reports',
            'edit reports',
            'delete reports',
            'create posts',
            'edit posts',
            'delete posts',
            'publish posts',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create Roles and assign permissions
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->syncPermissions(Permission::all());

        $managerRole = Role::firstOrCreate(['name' => 'manager']);
        $managerRole->syncPermissions([
            'view dashboard',
            'view reports',
            'edit reports',
            'create posts',
            'edit posts',
            'publish posts',
        ]);

        $userRole = Role::firstOrCreate(['name' => 'user']);
        $userRole->syncPermissions([
            'view dashboard',
            'create posts',
            'edit posts',
        ]);
    }
}
