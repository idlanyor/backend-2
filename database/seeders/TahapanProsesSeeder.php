<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahapanProsesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run()
    {
        // Data dummy untuk tabel 'tahapan_proses'
        $data = [
            ['proses' => 'Membuat akun pendaftaran online'],
            ['proses' => 'Melakukan aktivasi akun pendaftaran online'],
            ['proses' => 'Melengkapi formulir pendaftaran dan mengupload berkas'],
            ['proses' => 'Verifikasi data pendaftaran oleh petugas'],
            ['proses' => 'Melakukan daftar ulang & pembayaran biaya registrasi'],
        ];

        // Menyisipkan data dummy ke dalam tabel 'tahapan_proses'
        foreach ($data as $item) {
            DB::table('tahapan_proses')->insert($item);

        }
    }
}
