<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    public function index()
    {
        $date = Carbon::now()->format('d F Y');
        $page = "Dashboard";
        $activeMenu = "dashboard";

        return view('admin.index', ['page' => $page, 'activeMenu' => $activeMenu, 'date' => $date]);
    }
}
