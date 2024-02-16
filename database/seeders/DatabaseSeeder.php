<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminUser = User::create([
            'name' => 'Youssef Hihi',
            'email' => 'youssef@gmail.com',
            'password' => Hash::make('11111111'), 
            'role' => 'admin',
        ]);

        // Create an admin record
        Admin::create([
            'user_id' => $adminUser->id,
        ]);
    
    }
}
