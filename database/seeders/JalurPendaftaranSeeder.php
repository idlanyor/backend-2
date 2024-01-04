<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JalurPendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $data = [
            [
                'nama_jalur' => 'Afirmasi',
                'kuota' => '150',
            ],
            [
                'nama_jalur' => 'Prestasi',
                'kuota' => '250',
            ],
            [
                'nama_jalur' => 'Zonasi',
                'kuota' => '500',
            ],
            [
                'nama_jalur' => 'Perpindahan Orang Tua',
                'kuota' => '100',
            ],
        ];

        DB::table('jalur_pendaftaran')->insert($data);
    }
}
