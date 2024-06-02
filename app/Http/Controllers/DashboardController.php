<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\Warga;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $page = "Dashboard";
        $activeMenu = "dashboard";

        $countResident = Warga::count();
        $countFamily = Keluarga::count();

        return view('admin.index', ['page' => $page, 'activeMenu' => $activeMenu, 'countResident' => $countResident, 'countFamily' => $countFamily]);
    }
}
