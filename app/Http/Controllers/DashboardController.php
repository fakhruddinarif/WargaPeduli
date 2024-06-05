<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private function url()
    {
        $url = '';
        $user = Auth::user();
        if ($user->level->nama == 'Admin') {
            $url = 'admin';
        } elseif ($user->level->nama == 'Ketua RW') {
            $url = 'rw';
        } elseif ($user->level->nama == 'Ketua RT') {
            $url = 'rt';
        } elseif ($user->level->nama == 'Warga') {
            $url = 'warga';
        }

        return $url;
    }

    public function index()
    {
        $url = $this->url();
        $page = "Dashboard";
        $activeMenu = "dashboard";

        $countResident = Warga::count();
        $countFamily = Keluarga::count();

        return view('admin.index', ['url' => $url, 'page' => $page, 'activeMenu' => $activeMenu, 'countResident' => $countResident, 'countFamily' => $countFamily]);
    }
}
