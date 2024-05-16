<?php

namespace Database\Seeders;

use App\Models\Keluarga;
use App\Models\Warga;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Psy\Util\Str;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');
        $id = Keluarga::select('id')->get();
        $count = Keluarga::count();
        $status_keluarga = ['Kepala Keluarga', 'Istri', 'Anak', 'Cucu', 'Menantu'];
        $rt = 0;

        for ($i = 0; $i < $count; $i++) {
            if ($i % 5 == 0) {
                $rt++;
            }
            $alamat = $faker->address();
            foreach ($status_keluarga as $sk) {
                $number = mt_rand(1111111111, 9999999999);
                Warga::create([
                    'nik' => '35755625' . strval($number),
                    'nama' => $faker->name(),
                    'jenis_kelamin' => $faker->randomElement(['Laki-Laki', 'Perempuan']),
                    'tempat_lahir' => $faker->randomElement(['Kota Malang', 'Kota Batu', 'Kab. Malang']),
                    'tanggal_lahir' => $faker->date,
                    'alamat' => $alamat,
                    'status_warga' => 'Menetap',
                    'status_keluarga' => $sk,
                    'keluarga_id' => $id[$i]->id,
                    'rt_id' => $rt,
                ]);
            }
        }
    }
}
