<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GelombangAktifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'gelombang_ke' => 'Gelombang 1',
                'isAktif' => 1,
                'tahun_pelajaran' => '2023/2024',
                'periode_mulai' => '2023-08-01',
                'periode_akhir' => '2023-08-31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gelombang_ke' => 'Gelombang 2',
                'isAktif' => 0,
                'tahun_pelajaran' => '2023/2024',
                'periode_mulai' => '2023-09-01',
                'periode_akhir' => '2023-09-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data tambahan sesuai kebutuhan
        ];

        // Memasukkan data ke dalam tabel menggunakan metode insert dari Query Builder
        DB::table('gelombang_pendaftaran')->insert($data);
    }
}
