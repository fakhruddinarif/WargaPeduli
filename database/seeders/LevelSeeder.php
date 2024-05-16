<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Admin', 'Ketua RW', 'Ketua RT', 'Warga'];

        foreach ($data as $value) {
            Level::create([
                'nama' => $value
            ]);
        }
    }
}
