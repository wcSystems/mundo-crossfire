<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Roles();
        $role_user->name = 'Admin';
        $role_user->save();

        $role_user = new Roles();
        $role_user->name = 'Employee';
        $role_user->save();

        $role_user = new Roles();
        $role_user->name = 'User';
        $role_user->save();
    }
}
