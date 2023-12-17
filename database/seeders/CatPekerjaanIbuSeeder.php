<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatPekerjaanIbuSeeder extends Seeder
{
    public static function run(): void
    {
        $dummyData = [
            ['nama' => 'Pegawai Negeri Sipil'],
            ['nama' => 'Pengusaha'],
            ['nama' => 'Wiraswasta'],
            ['nama' => 'Petani'],
            ['nama' => 'Karyawan'],
            ['nama' => 'Nelayan'],
            ['nama' => 'Buruh'],
            ['nama' => 'Guru'],
            ['nama' => 'Dokter'],
            ['nama' => 'Pekerja Lepas'],
            ['nama' => 'TNI/Polri'],
            ['nama' => 'Pensiunan'],
            ['nama' => 'Ibu Rumah Tangga'],
            ['nama' => 'Tidak bekerja'],
        ];

        foreach ($dummyData as $data) {
            DB::table('cat_pekerjaan_ibu')->insert($data);
        }
    }
}
