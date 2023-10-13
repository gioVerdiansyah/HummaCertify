<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DataAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::firstOrCreate([
            'email' => 'gioverdiansyh@gmail.com',
        ], [
            'name' => 'Verdi',
            'password' => Hash::make('blackjack')
        ]);
        Admin::firstOrCreate([
            'email' => 'akunrizky85@gmail.com',
        ], [
            'name' => 'Rizki',
            'password' => Hash::make('12345678')
        ]);
        Admin::firstOrCreate([
            'email' => 'VianRiztanta71@gmail.com',
        ], [
            'name' => 'Bababoi',
            'password' => Hash::make('Andika123')
        ]);
        Admin::firstOrCreate([
            'email' => 'ahmadilyasfitonopc@gmail.com',
        ], [
            'name' => 'Ilyas',
            'password' => Hash::make('Shs12345')
        ]);
        Admin::firstOrCreate([
            'email' => 'permatalintang29@gmail.com',
        ], [
            'name' => 'Lintang',
            'password' => Hash::make('lintang123')
        ]);
    }
}
