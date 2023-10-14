<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('HummaCertify')
        ]
    );
        User::create([
            'name' => "Admin",
            'email' => "hummacertify@gmail.com",
            "password" => Hash::make('admin-hummacertify')
        ]
    );
    }
}
