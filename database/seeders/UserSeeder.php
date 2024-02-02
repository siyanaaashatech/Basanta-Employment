<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run()
    {
        // $superAdminRole = Role::where('name', 'Super Admin')->first();

        $superAdminUser = User::create([
            'name' => "superadmin",
            'email' => 'info.aashatech@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $superAdminRole = Role::where('name', 'superadmin')->first();
        $superAdminUser->assignRole($superAdminRole);

    }
}