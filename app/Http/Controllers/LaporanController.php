<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request)
    {
        $request->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan' => 'required|string|max:255'
        ]);
        try {
            $data = $request->all();
            $user = Auth::user();
            $latest = Laporan::latest()->first();
            $id = $latest ? $latest->id + 1 : 1;
            if ($request->hasFile('bukti')) {
                $extension = $request->file('bukti')->extension();
                $path = $request->file('bukti')->storeAs('laporan', "{$id}.{$extension}", 'public');
                $url = Storage::url($path);
                $data['bukti'] = $url;
            }
            Laporan::create([
                'tanggal' => now(),
                'keterangan' => $data['keterangan'],
                'bukti' => $data['bukti'],
                'status' => 'Menunggu Konfirmasi',
                'user_id' => $user->id,
            ]);
            Session::flash('success', 'Laporan berhasil ditambahkan');
            return redirect($this->url());
        } catch (QueryException $e) {
            Session::flash('error', 'Laporan gagal ditambahkan');
            return redirect($this->url());
        }
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
            return redirect('/' . $this->url() .'/laporan');
        } catch (QueryException $e) {
            Session::flash('errors', 'Laporan gagal diubah');
            return redirect('/' . $this->url() .'/laporan');
        }
    }

    public function destroy($id)
    {
        try {
            $laporan = Laporan::find($id);
            $laporan->delete();
            Session::flash('success', 'Laporan berhasil dihapus');
            return redirect('/' . $this->url() .'/laporan');
        } catch (QueryException $e) {
            Session::flash('error', 'Laporan gagal dihapus');
            return redirect('/' . $this->url() .'/laporan');
        }
    }

    public function riwayat($id)
    {
        $data = Laporan::find($id);
        return response()->json($data);
    }
}
