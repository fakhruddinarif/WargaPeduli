<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminLaporan extends Controller
{
    public function index()
    {
        $page = "Laporan";
        $activeMenu = "laporan";

        return view('admin.laporan.index', ['page' => $page, 'activeMenu' => $activeMenu]);
    }
     public function detail($id)
    {
        $laporan = Laporan::find($id);
        $page = "Laporan";
        $activeMenu = "laporan";
        $status = ['Menunggu Konfirmasi', 'Diterima', 'Ditolak', 'Diproses', 'Selesai'];
        return view('admin.laporan.detail', ['page' => $page, 'activeMenu' => $activeMenu, 'data' => $laporan, 'status' => $status]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string'
        ]);
        try {
            $laporan = Laporan::find($id);
            $laporan->update([
                'status' => $request->status
            ]);
            Session::flash('success', 'Laporan berhasil diubah');
            return redirect('/admin/laporan');
        } catch (QueryException $e) {
            Session::flash('errors', 'Laporan gagal diubah');
            return redirect('/admin/laporan');
        }
    }
}
