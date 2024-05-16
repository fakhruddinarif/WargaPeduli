<?php

namespace Database\Seeders;

use App\Models\RukunTetangga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RukunTetanggaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 8; $i++) {
            RukunTetangga::create([
                'nomor' => strval($i)
            ]);
        }
    }
}
