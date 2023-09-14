<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'Manager',
                'email' => 'manager@gmail.com',
                'password' => bcrypt('12345678'),
                'role_id' => 1
            ]
        );

        User::create(
            [
                'name' => 'Employee',
                'email' => 'employee@gmail.com',
                'password' => bcrypt('12345678'),
                'role_id' => 2
            ]
        );
    }
}
