<?php

namespace Database\Seeders;

use App\Models\Keluarga;
use App\Models\RukunTetangga;
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
        $alamat = 'Jalan Kalpataru Gg.';
        $status_keluarga = ['Kepala Keluarga', 'Istri', 'Anak', 'Menantu', 'Cucu'];
        $keluarga = Keluarga::all();
        $rt = 0;
        $gender = ['male', 'female'];


        foreach ($keluarga as $key => $value) {
            if ($key % 12 == 0) {
                $rt++;
            }
            foreach ($status_keluarga as $str => $item) {
                $number = mt_rand(111111, 999999);
                $phoneNumber = $faker->phoneNumber;
                $phoneNumber = str_replace(['(+62)', ' '], ['08', ''], $phoneNumber);
                $genderByIndonesia = $gender[$str % 2] == 'male' ? 'Laki-laki' : 'Perempuan';
                Warga::create([
                    'nik' => '3093827485' . strval($number),
                    'nama' => $faker->name($gender[$str % 2]),
                    'jenis_kelamin' => $genderByIndonesia,
                    'tempat_lahir' => $faker->city,
                    'tanggal_lahir' => $faker->date(),
                    'alamat' => $alamat . strval($rt) . ' No. ' . strval($key % 12 + 1),
                    'ibu_kandung' => $faker->name('female'),
                    'status_warga' => 'Menetap',
                    'status_keluarga' => $item,
                    'telepon' => $phoneNumber,
                    'keluarga_id' => $value->id,
                    'rt_id' => $rt
                ]);
            }
        }
    }
}
