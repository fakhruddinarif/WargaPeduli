<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LaporanController extends Controller
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
        $page = "Laporan";
        $activeMenu = "laporan";

        return view('admin.laporan.index', ['url' => $url, 'page' => $page, 'activeMenu' => $activeMenu]);
    }
    public function detail($id)
    {
        $url = $this->url();
        $laporan = Laporan::find($id);
        $page = "Laporan";
        $activeMenu = "laporan";
        $status = ['Menunggu Konfirmasi', 'Diterima', 'Ditolak', 'Diproses', 'Selesai'];
        return view('admin.laporan.detail', ['url' => $url, 'page' => $page, 'activeMenu' => $activeMenu, 'data' => $laporan, 'status' => $status]);
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

    public function destroy($id)
    {
        try {
            $laporan = Laporan::find($id);
            $laporan->delete();
            Session::flash('success', 'Laporan berhasil dihapus');
            return redirect('/admin/laporan');
        } catch (QueryException $e) {
            Session::flash('error', 'Laporan gagal dihapus');
            return redirect('/admin/laporan');
        }
    }
}
