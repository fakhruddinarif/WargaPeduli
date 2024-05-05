<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminBansos extends Controller
{
    public function index()
    {
        $date = Carbon::now()->isoFormat('D MMMM Y');
        $page = "Bantuan Sosial";
        $activeMenu = "bansos";

        return view('admin.bansos.index', ['page' => $page, 'activeMenu' => $activeMenu, 'date' => $date]);
    }
}
