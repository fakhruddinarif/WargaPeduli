<?php

namespace App\Http\Controllers;

use App\Models\BantuanSosial;
use App\Models\DetailBantuanSosial;
use App\Models\Keluarga;
use App\Models\Laporan;
use App\Models\Pengajuan;
use App\Models\RukunTetangga;
use App\Models\User;
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
        $user = Auth::user();
        $bansos = BantuanSosial::where('tanggal_selesai', '>=', now())->get();
        $historyBansos = DetailBantuanSosial::where('user_id', $user->id)->get();
        $historyReport = Laporan::where('user_id', $user->id)->get();

        if ($url == 'admin' || $url == 'rw') {
            if ($url == 'admin') {
                $pengajuan = Pengajuan::where('status', 'Diterima')->get();
            }
            $countResident = Warga::count();
            $countFamily = Keluarga::count();
            $countReportWaiting = Laporan::where('status', 'Menunggu Konfirmasi')->count();
            $countReportProcessing = Laporan::where('status', 'Diproses')->count();
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

            if ($url == 'admin') {
                return view('admin.index', ['url' => $url, 'page' => $page, 'activeMenu' => $activeMenu, 'countResident' => $countResident, 'countFamily' => $countFamily, 'countReportWaiting' => $countReportWaiting, 'countReportProcessing' => $countReportProcessing, 'amount' => $amount, 'age' => $age, 'rt' => $rtNumbers, 'pengajuan' => $pengajuan]);
            }
            return view('admin.index', ['url' => $url, 'page' => $page, 'activeMenu' => $activeMenu, 'countResident' => $countResident, 'countFamily' => $countFamily, 'countReportWaiting' => $countReportWaiting, 'countReportProcessing' => $countReportProcessing, 'amount' => $amount, 'age' => $age, 'rt' => $rtNumbers]);
        }
        else if ($url == 'rt') {
            $nomor = User::join('keluarga', 'user.keluarga_id', '=', 'keluarga.id')
                ->join('warga', 'keluarga.id', '=', 'warga.keluarga_id')
                ->join('rukun_tetangga', 'warga.rt_id', '=', 'rukun_tetangga.id')
                ->where('keluarga.id', $user->keluarga_id)
                ->select('rukun_tetangga.nomor', 'rukun_tetangga.id')
                ->distinct()
                ->get();
            $pengajuan = Pengajuan::where('status', 'Menunggu Konfirmasi')
                ->where('rt_id', $nomor[0]->id)
                ->get();
            $rt = RukunTetangga::all();
            return view('rt.index', ['url' => $url, 'page' => $page, 'activeMenu' => $activeMenu, 'nomor' => $nomor, 'pengajuan' => $pengajuan, 'rt' => $rt, 'bansos' => $bansos, 'historyBansos' => $historyBansos, 'historyReport' => $historyReport]);
        }
        else {
            $keluarga = Keluarga::find($user->keluarga_id);
            return view('warga.index', ['url' => $url, 'page' => $page, 'activeMenu' => $activeMenu, 'bansos' => $bansos, 'keluarga' => $keluarga, 'historyBansos' => $historyBansos, 'historyReport' => $historyReport]);
        }
    }
}
