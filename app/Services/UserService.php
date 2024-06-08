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
}
