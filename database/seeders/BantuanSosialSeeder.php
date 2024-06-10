<?php

namespace Database\Seeders;

use App\Models\BantuanSosial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BantuanSosialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = ['PKH', 'Pemakanan', 'KIP', 'BPNT', 'PBIJKN'];
        foreach ($type as $value) {
            BantuanSosial::create([
                'tanggal_mulai' => now(),
                'tanggal_selesai' => '2024-06-30',
                'jenis' => $value,
                'kapasitas' => 30,
            ]);
        }
    }
}
