<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        $user = User::create([
            'name' => 'Developer',
            'email' => 'platform.singularity@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $user->assignRole('Superadmin');
    }
}
