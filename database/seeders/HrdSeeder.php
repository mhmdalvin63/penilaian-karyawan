<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HrdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'hrd',
            'nik' => 'hrd123',
            'email' => 'hrd@gmail.com',
            'role' => 'hrd',
            'password' => Hash::make('hrd123'),
        ]);
    }
}
