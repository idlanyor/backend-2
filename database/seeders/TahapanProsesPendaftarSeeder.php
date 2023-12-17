<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahapanProsesPendaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $dummyData = [
            ['user_id' => 1, 'id_tahapan_proses' => 1, 'status' => 'Selesai'],
            ['user_id' => 1, 'id_tahapan_proses' => 2, 'status' => 'Selesai'],
            ['user_id' => 1, 'id_tahapan_proses' => 3, 'status' => 'Proses'],
            ['user_id' => 1, 'id_tahapan_proses' => 3, 'status' => 'Proses'],
            ['user_id' => 1, 'id_tahapan_proses' => 3, 'status' => 'Proses'],
        ];
        foreach ($dummyData as $data) {
            DB::table('tahapan_proses_pendaftar')->insert($data);
        }
    }
}
