<?php

namespace App\Service;

use App\Models\Keluarga;

class PendudukService {
    public function checkFamilyExist($nkk) {
        $keluarga = Keluarga::where('nkk', $nkk)->count();
        if ($keluarga > 0) {
            return true;
        }
        return false;
    }
}
