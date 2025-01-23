<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Membuat user dengan role 'admin'
        User::create([
            'name' => 'Admin RPL',
            'email' => 'admin@rplkawali.com',
            'password' => Hash::make('adminpassword'), // Jangan lupa untuk mengenkripsi password
            'role' => 'admin', // Menetapkan role admin
        ]);
    }
}
