<?php

namespace App\Service;

use App\Models\Keluarga;
use App\Models\Warga;

class PendudukService {
    public function checkFamilyExist($nkk) {
        $keluarga = Keluarga::where('nkk', $nkk)->count();
        if ($keluarga > 0) {
            return true;
        }
        return false;
    }

    public function checkResidentExist($nik)
    {
        $resident = Warga::where('nik', $nik)->count();
        if ($resident > 0) {
            return true;
        }
        return false;
    }
}
