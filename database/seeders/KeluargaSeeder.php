<?php

namespace Database\Seeders;

use App\Models\Keluarga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 96; $i++) {
            $number = mt_rand(111111, 999999);
            Keluarga::create([
                'nkk' => '3092831047' . strval($number),
                'pendapatan' => mt_rand(1_000_000, 10_000_000),
                'luas_bangunan' => mt_rand(20, 200),
                'jumlah_tanggungan' => mt_rand(1, 10),
                'pajak_bumi' => mt_rand(10_000, 100_000),
                'tagihan_listrik' => mt_rand(20_000, 200_000),
            ]);
        }
    }
}
