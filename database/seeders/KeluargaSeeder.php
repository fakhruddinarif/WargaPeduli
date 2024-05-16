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
        for ($i = 0; $i < 40; $i++) {
            $number = mt_rand(1111111111, 9999999999);
            Keluarga::create([
                'nkk' => '35755665' . strval($number),
                'pendapatan' => mt_rand(1000000, 10000000),
                'luas_bangunan' => mt_rand(20, 200),
                'jumlah_tanggungan' => fake()->randomDigit(),
                'pajak_bumi' => mt_rand(10000, 100000)
            ]);
        }
    }
}
