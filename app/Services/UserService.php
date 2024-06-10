<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService {
    public function checkUsernameExist($username) {
        $user = User::where('username', $username)->count();
        if ($user > 0) {
            return true;
        }
        return false;
    }

    public function checkAccountFamily($keluarga_id) {
        $user = User::where('keluarga_id', $keluarga_id)->count();
        if ($user > 0) {
            return true;
        }
        return false;
    }

    public function checkLevelRT($level, $rt)
    {
        $data = User::join('keluarga', 'user.keluarga_id', '=', 'keluarga.id')
            ->join('warga', 'keluarga.id', '=', 'warga.keluarga_id')
            ->where('user.level_id', $level)
            ->where('warga.rt_id', $rt)
            ->select('user.id')
            ->distinct()
            ->get();

        return $data->isEmpty() ? false : true;
    }

    public function checkLevelRW($level)
    {
        $data = User::where('level_id', $level)->get();

        return $data->isEmpty() ? false : true;
    }
}
