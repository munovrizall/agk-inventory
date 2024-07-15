<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin'),
            'no_telp' => '081234567890',
            'is_active' => true
        ]);

        $admin->assignRole('Admin Gudang');
        
        $kepalaGudang = User::create([
            'name' => 'Jale',
            'username' => 'jale',
            'email' => 'jale@email.com',
            'password' => Hash::make('jale'),
            'no_telp' => '081234567890',
            'is_active' => true
        ]);

        $kepalaGudang->assignRole('Kepala Gudang');

    }
}
