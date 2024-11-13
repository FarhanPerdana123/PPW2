<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat user baru atau update jika email sudah ada
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // Ganti dengan email admin yang diinginkan
            [
                'name' => 'Admin', // Nama admin
                'password' => Hash::make('akuadmin'), // Ganti dengan password admin yang diinginkan
                'level' => 'admin', // Menetapkan level admin
            ]
        );
    }
}
