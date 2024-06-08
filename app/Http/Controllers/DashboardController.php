<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\RukunTetangga;
use App\Models\Warga;
use App\Services\ChartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private ChartService $chartService;
    public function __construct(ChartService $chartService)
    {
        $this->chartService = $chartService;
    }
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
        $residentsAge = Warga::select('nama', DB::raw('YEAR(CURRENT_DATE) - YEAR(tanggal_lahir) as usia'))->get();

        $amount = Warga::rightJoin('rukun_tetangga as rt', 'warga.rt_id', '=', 'rt.id')
            ->select(DB::raw('COUNT(warga.nik) as jumlah_warga'))
            ->groupBy('rt.nomor')
            ->pluck('jumlah_warga');
        $age = $this->chartService->categoryResidentByAge($residentsAge); //Pie Chart
        $rt = RukunTetangga::all();
        $rtNumbers = array_map(function($number) {
            return 'RT 0' . $number;
        }, $rt->pluck('nomor')->toArray());

        return view('admin.index', ['url' => $url, 'page' => $page, 'activeMenu' => $activeMenu, 'countResident' => $countResident, 'countFamily' => $countFamily, 'amount' => $amount, 'age' => $age, 'rt' => $rtNumbers]);
    }
}
