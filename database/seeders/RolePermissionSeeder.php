<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);
        $user = User::create([
            'name' => 'admin',
            'lastName' => 'admin',
            'nationalCode' => '1234567891',
            'birthDate' => "1399-09-09",
            'mobile' => '0918',
            'password' => Hash::make('121212'),
        ]);
        $user->assignRole('admin');

    }
}
