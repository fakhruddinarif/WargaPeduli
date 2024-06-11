<?php

namespace App\Services;

use App\Models\DetailBantuanSosial;

class BansosService {
    public function pengajuanExist($bansos, $user)
    {
        $data = DetailBantuanSosial::where('bansos_id', $bansos)
            ->where('user_id', $user)
            ->count();
        return $data > 0 ? true : false;
    }
}
