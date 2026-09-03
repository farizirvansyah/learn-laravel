<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'role_id' => 1,
            'email' => 'admin@gmail.com',
            'password' => '123'
        ]);
        User::create([
            'name' => 'Kasir',
            'role_id' => 2,
            'email' => 'kasir@gmail.com',
            'password' => '123'
        ]);
        User::create([
            'name' => 'Pimpinan',
            'role_id' => 3,
            'email' => 'pimpinan@gmail.com',
            'password' => '123'
        ]);
    }
}
