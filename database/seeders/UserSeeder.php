<?php

namespace Database\Seeders;

use App\Models\Keluarga;
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

        $family = Keluarga::all();
        foreach ($family as $fam) {
            User::create([
                'username' => $fam->nkk,
                'password' => bcrypt($fam->nkk),
                'level_id' => 4,
                'keluarga_id' => $fam->id,
            ]);
        }
    }
}
