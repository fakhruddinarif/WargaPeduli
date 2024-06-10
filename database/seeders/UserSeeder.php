<?php

namespace Database\Seeders;

use App\Models\Keluarga;
use App\Models\RukunTetangga;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'level_id' => 1,
        ]);

        $rt = RukunTetangga::all();

        foreach ($rt as $item) {
            $family = Keluarga::select('keluarga.id', 'nkk', 'rt_id')
                ->join('warga', 'keluarga.id', '=', 'warga.keluarga_id')
                ->where('rt_id', $item->id)
                ->distinct()
                ->get();
            foreach ($family as $key => $value) {
                User::create([
                    'username' => $value->nkk,
                    'password' => bcrypt($value->nkk),
                    'level_id' => $key == 0 ? 3 : 4,
                    'keluarga_id' => $value->id,
                ]);
            }
        }
    }
}
