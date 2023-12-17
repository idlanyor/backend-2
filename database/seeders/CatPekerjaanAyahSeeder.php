<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatPekerjaanAyahSeeder extends Seeder
{
    public static function run(): void
    {
        $dummyData = [
            ['nama' => 'Pegawai Negeri Sipil'],
            ['nama' => 'Pengusaha'],
            ['nama' => 'Wiraswasta'],
            ['nama' => 'Karyawan'],
            ['nama' => 'Petani'],
            ['nama' => 'Nelayan'],
            ['nama' => 'Buruh'],
            ['nama' => 'Guru'],
            ['nama' => 'Dokter'],
            ['nama' => 'Sopir'],
            ['nama' => 'Pekerja Lepas'],
            ['nama' => 'TNI/Polri'],
            ['nama' => 'Pensiunan'],
            ['nama' => 'Tidak bekerja'],
        ];

        foreach ($dummyData as $data) {
            DB::table('cat_pekerjaan_ayah')->insert($data);
        }
    }
}
