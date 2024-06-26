<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Keluarga>
 */
class KeluargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $number = mt_rand(1111111111, 9999999999);
        return [
            'nkk' => '35755665' . strval($number),
            'pendapatan' => mt_rand(900000, 5000000),
            'luas_bangunan' => mt_rand(10, 100),
            'jumlah_tanggungan' => mt_rand(1, 5),
            'pajak_bumi' => mt_rand(25000, 150000),
            'tagihan_listrik' => mt_rand(70000, 150000)
        ];
    }
}
