<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalJalurPendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {

        $data = [
            [
                'simulasi_mulai' => '2024-01-01',
                'simulasi_akhir' => '2024-01-15',
                'pendaftaran_mulai' => '2024-01-20',
                'pendaftaran_akhir' => '2024-02-10',
                'seleksi_awal' => '2024-02-15',
                'seleksi_akhir' => '2024-02-28',
                'daftar_ulang_awal' => '2024-03-10',
                'daftar_ulang_akhir' => '2024-03-20',
                'pengumuman' => '2024-03-25',
                'id_jalur' => 1, // Sesuaikan dengan id jalur dari tabel jalur_pendaftaran
            ],
            [
                'simulasi_mulai' => '2024-01-05',
                'simulasi_akhir' => '2024-01-20',
                'pendaftaran_mulai' => '2024-01-25',
                'pendaftaran_akhir' => '2024-02-15',
                'seleksi_awal' => '2024-02-20',
                'seleksi_akhir' => '2024-03-05',
                'daftar_ulang_awal' => '2024-03-15',
                'daftar_ulang_akhir' => '2024-03-25',
                'pengumuman' => '2024-03-30',
                'id_jalur' => 2, // Sesuaikan dengan id jalur dari tabel jalur_pendaftaran
            ],
            // Tambahkan data lain jika diperlukan
        ];

        // Insert data menggunakan DB::table()->insert()
        DB::table('jadwal_jalur_pendaftaran')->insert($data);
    }
}
