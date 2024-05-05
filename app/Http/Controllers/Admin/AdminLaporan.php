<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminLaporan extends Controller
{
    public function index()
    {
        $date = Carbon::now()->isoFormat('D MMMM Y');
        $page = "Laporan";
        $activeMenu = "laporan";

        return view('admin.laporan.index', ['page' => $page, 'activeMenu' => $activeMenu, 'date' => $date]);
    }
}
