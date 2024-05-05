<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminInformasi extends Controller
{
    public function index()
    {
        $date = Carbon::now()->isoFormat('D MMMM Y');
        $page = "Informasi";
        $activeMenu = "informasi";

        return view('admin.informasi.index', ['page' => $page, 'activeMenu' => $activeMenu, 'date' => $date]);
    }
}
