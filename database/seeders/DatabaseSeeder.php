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
            'name' => "HummaCertify",
            'email' => "hummacertify@gmail.com",
            "password" => Hash::make('admin-hummacertify'),
            'nomor_induk' => "Admin nih boss",
            'institusi' => "Perusahaan Hummatech"
        ]);

        CertificateCategori::create([
            'name' => "Kelulusan",
            'background_depan' => '/image/certificate/bgdepan/certificate-kelulusan.png',
            'background_belakang' => '/image/certificate/bgbelakang/certificate-kelulusan.png'
        ]);
        CertificateCategori::create([
            'name' => "Pelatihan",
            'background_depan' => '/image/certificate/bgdepan/certificate-guru.png',
            'background_belakang' => '/image/certificate/bgbelakang/certificate-guru.png'
        ]);
        CertificateCategori::create([
            'name' => "Kompetensi",
            'background_depan' => '/image/certificate/bgdepan/certificate-guru-tamu.png',
            'background_belakang' => '/image/certificate/bgbelakang/certificate-guru-tamu.png'
        ]);
    }
}
