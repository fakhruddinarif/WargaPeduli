<?php

namespace Database\Seeders;

use App\Models\BantuanSosial;
use App\Models\DetailBantuanSosial;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailBantuanSosialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bantuanSosial = BantuanSosial::find(4);
        $user = User::select('user.id as id', 'pendapatan', 'jumlah_tanggungan', 'luas_bangunan', 'pajak_bumi', 'tagihan_listrik')
            ->join('keluarga', 'user.keluarga_id', '=', 'keluarga.id')
            ->get();

        foreach ($user as $u) {
            DetailBantuanSosial::create([
                'pendapatan' => $u->pendapatan,
                'jumlah_tanggungan' => $u->jumlah_tanggungan,
                'luas_bangunan' => $u->luas_bangunan,
                'pajak_bumi' => $u->pajak_bumi,
                'tagihan_listrik' => $u->tagihan_listrik,
                'bansos_id' => $bantuanSosial->id,
                'user_id' => $u->id,
                'status' => 'Menunggu Konfirmasi',
            ]);
        }
    }
}
