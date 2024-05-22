<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warga>
 */
class WargaFactory extends Factory
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
            'nik' => '35755625' . strval($number),
            'nama' => fake()->name(),
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'tempat_lahir' => fake()->randomElement(['Kota Malang', 'Kota Batu', 'Kab. Malang']),
            'tanggal_lahir' => fake()->date(),
            'alamat' => fake()->address(),
            'status_warga' => fake()->randomElement(['Menetap', 'Pendatang', 'Merantau']),
            'status_keluarga' => fake()->randomElement(['Kepala Keluarga', 'Istri', 'Anak', 'Cucu', 'Menantu', 'Lainnya']),
            'telepon' => fake()->phoneNumber(),
        ];
    }
}
