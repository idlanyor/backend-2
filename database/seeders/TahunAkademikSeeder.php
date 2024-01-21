<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahunAkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $dummyData = [
            ['tahun_ajaran' => "2022/2023", 'mulai' => "2022-07-15", 'akhir' => "2023-04-02", 'status' => 1],
            ['tahun_ajaran' => "2023/2024", 'mulai' => "2023-06-05", 'akhir' => null, 'status' => 0],
        ];
        foreach ($dummyData as $data) {
            DB::table('tahun_ajaran')->insert($data);
        }
    }
}
