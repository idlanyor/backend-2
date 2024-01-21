<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        GelombangAktifSeeder::run();
        CatPekerjaanIbuSeeder::run();
        CatPekerjaanAyahSeeder::run();
        CatPendidikanTerakhirSeeder::run();
        CatPenghasilanSeeder::run();
        TahapanProsesSeeder::run();
        JalurPendaftaranSeeder::run();
        JadwalJalurPendaftaranSeeder::run();
        TahunAkademikSeeder::run();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
