<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminPenduduk extends Controller
{
    public function index()
    {
        $date = Carbon::now()->isoFormat('D MMMM Y');
        $page = "Penduduk";
        $activeMenu = "penduduk";

        return view('admin.penduduk.index', ['page' => $page, 'activeMenu' => $activeMenu, 'date' => $date]);
    }
}
