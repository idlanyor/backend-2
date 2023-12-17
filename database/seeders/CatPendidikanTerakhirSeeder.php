<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatPendidikanTerakhirSeeder extends Seeder
{
    public static function run(): void
    {
        $dummyData = [
            ['nama' => 'Tidak Sekolah'],
            ['nama' => 'Taman Kanak-Kanak (TK)'],
            ['nama' => 'Sekolah Dasar (SD)'],
            ['nama' => 'Sekolah Menengah Pertama (SMP)'],
            ['nama' => 'Sekolah Menengah Atas (SMA)'],
            ['nama' => 'Diploma 1 (D1)'],
            ['nama' => 'Diploma 2 (D2)'],
            ['nama' => 'Diploma 3 (D3)'],
            ['nama' => 'Diploma 4 (D4)'],
            ['nama' => 'Sarjana (S1)'],
            ['nama' => 'Magister (S2)'],
            ['nama' => 'Doktor (S3)'],
        ];

        foreach ($dummyData as $data) {
            DB::table('cat_pend_terakhir')->insert($data);
        }
    }
}
