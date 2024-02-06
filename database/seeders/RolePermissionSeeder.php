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
            'delete_cover_images',
            'create_about_us',
            'list_about_us',
            'edit_about_us',
            'delete_about_us',
            'create_services',
            'list_services',
            'edit_services',
            'delete_services',
            'create_favicons',
            'list_favicons',
            'edit_favicons',
            'delete_favicons',
            'create_photo_galleries',
            'list_photo_galleries',
            'edit_photo_galleries',
            'delete_photo_galleries',
            'create_video_galleries',
            'list_video_galleries',
            'edit_video_galleries',
            'delete_video_galleries'

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
            'delete_cover_images',
            'create_about_us',
            'list_about_us',
            'edit_about_us',
            'delete_about_us',
            'create_services',
            'list_services',
            'edit_services',
            'delete_services',
            'create_favicons',
            'list_favicons',
            'edit_favicons',
            'delete_favicons',
            'create_photo_galleries',
            'list_photo_galleries',
            'edit_photo_galleries',
            'delete_photo_galleries',
            'create_video_galleries',
            'list_video_galleries',
            'edit_video_galleries',
            'delete_video_galleries'

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