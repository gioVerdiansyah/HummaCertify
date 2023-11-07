<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\CertificateCategori;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'id' => Str::uuid(),
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('HummaCertify'),
            'institusi' => "Perusahaan Hummatech"
        ]);

        User::create([
            'id' => Str::uuid(),
            'name' => "HummaCertify",
            'email' => "hummacertify@gmail.com",
            "password" => Hash::make('admin-hummacertify'),
            'institusi' => "Perusahaan Hummatech"
        ]);

        CertificateCategori::create([
            'name' => "Kelulusan",
            'background_depan' => 'storage/bgdepan/certificate-kelulusan.png',
            'background_belakang' => 'storage/bgbelakang/certificate-kelulusan.png'
        ]);
        CertificateCategori::create([
            'name' => "Pelatihan",
            'background_depan' => 'storage/bgdepan/certificate-guru.png',
            'background_belakang' => 'storage/bgbelakang/certificate-guru.png'
        ]);
        CertificateCategori::create([
            'name' => "Kompetensi",
            'background_depan' => 'storage/bgdepan/certificate-guru-tamu.png',
            'background_belakang' => 'storage/bgbelakang/certificate-guru-tamu.png'
        ]);
    }
}
