<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatPenghasilanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $dummyData = [
            ['nama' => 'Kurang dari Rp 1.000.000'],
            ['nama' => 'Rp 1.000.000 - Rp 3.000.000'],
            ['nama' => 'Rp 3.000.000 - Rp 5.000.000'],
            ['nama' => 'Rp 5.000.000 - Rp 10.000.000'],
            ['nama' => 'Lebih dari Rp 10.000.000'],
            ['nama' => 'Tidak Berpenghasilan'],
        ];

        foreach ($dummyData as $data) {
            DB::table('cat_penghasilan')->insert($data);
        }
    }
}
