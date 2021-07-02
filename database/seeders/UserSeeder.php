<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            "name" => "Usuario Administrador",
            "email" => "admin@admin.com",
            "password" => Hash::make('admin2020'),
            "role_id"=>1,
        ]);//

        $user = User::create([
            "name" => "Usuario Cliente",
            "email" => "cliente@admin.com",
            "password" => Hash::make('admin2020'),
            "role_id"=>3,
        ]);//
    }
}
