<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Define the list of roles
        $listOfRoles = [
            'superadmin',
            'admin'
        ];
        // Define the list of permissions
        $arrayOfPermissionNames = [
            'create_site_settings',
            'list_site_settings',
            'edit_site_settings',
            'delete_site_settings',
            'create_cover_images',
            'list_cover_images',
            'edit_cover_images',
            'delete_cover_images'
        ];

        // Create the permissions
        foreach ($arrayOfPermissionNames as $permissionName) {
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }
        // define permission for super admin
        $permissionIdsForSuperAdminRole = Permission::all()->pluck('name');

        //define permission for District Admin
        $permissionForAdmin = [
            'create_site_settings',
            'list_site_settings',
            'edit_site_settings',
            'delete_site_settings',
            'create_cover_images',
            'list_cover_images',
            'edit_cover_images',
            'delete_cover_images'

        ];


        // Create roles and assign permissions to each role
        foreach ($listOfRoles as $roleName) {
            $role = Role::create(['name' => $roleName]);

            // Assign specific permissions based on role
            switch ($roleName) {
                case 'superadmin':
                    $role->syncPermissions($permissionIdsForSuperAdminRole);
                    break;
                case 'admin':
                    $role->givePermissionTo($permissionForAdmin);
                    break;
            }

        }
    }
}