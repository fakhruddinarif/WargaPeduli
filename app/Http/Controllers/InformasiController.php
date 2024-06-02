<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    protected $rules = [
        'judul' => 'required|string|max:100',
        'jenis' => 'required|string',
        'keterangan' => 'required|string',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];
    public function index()
    {
        $page = "Informasi";
        $activeMenu = "informasi";

        return view('admin.informasi.index', ['page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function create()
    {
        $page = "Informasi";
        $activeMenu = "informasi";
        $jenis = ['Pengumuman', 'Berita', 'Kegiatan'];
        return view('admin.informasi.create', ['page' => $page, 'activeMenu' => $activeMenu, 'jenis' => $jenis]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate($this->rules);
            $latest = Informasi::latest()->first();
            $id = $latest ? $latest->id + 1 : 1;
            if ($request->hasFile('gambar')) {
                $extension = $request->file('gambar')->extension();
                $path = $request->file('gambar')->storeAs('informasi', "{$id}.{$extension}", 'public');
                $url = Storage::url($path);
                $request->gambar = $url;
            }
            Informasi::create([
                'judul' => $request->judul,
                'jenis' => $request->jenis,
                'keterangan' => $request->keterangan,
                'gambar' => $request->gambar,
                'tanggal' => Carbon::now()
            ]);
            Session::flash('success', 'Informasi berhasil ditambahkan');
            return redirect('/admin/informasi');
        } catch (QueryException $e) {
            Session::flash('errors', 'Informasi gagal ditambahkan');
            return redirect('/admin/informasi/create')->withInput();
        }
    }
    public function detail($id)
    {
        $informasi = Informasi::find($id);
        $page = "Informasi";
        $activeMenu = "informasi";
        $jenis = ['Pengumuman', 'Berita', 'Kegiatan'];
        return view('admin.informasi.detail', ['page' => $page, 'activeMenu' => $activeMenu, 'jenis' => $jenis, 'data' => $informasi]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:100',
            'jenis' => 'required|string',
            'keterangan' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $informasi = Informasi::find($id);
        $request->gambar = $informasi->gambar;
        try {
            if ($request->hasFile('gambar')) {
                $id = $informasi->id;
                $extension = $request->file('gambar')->extension();
                $path = $request->file('gambar')->storeAs('informasi', "{$id}.{$extension}", 'public');
                $url = Storage::url($path);
                $request->gambar = $url;
            }
            $informasi->update([
                'judul' => $request->judul,
                'jenis' => $request->jenis,
                'keterangan' => $request->keterangan,
                'gambar' => $request->gambar,
            ]);
            Session::flash('success', 'Informasi berhasil diubah');
            return redirect('/admin/informasi/' . $id);
        } catch (QueryException $e) {
            Session::flash('errors', 'Informasi gagal diubah');
            return redirect('/admin/informasi/' . $id)->withInput();
        }
    }

    public function destroy($id)
    {
        $informasi = Informasi::find($id);
        if (!$informasi) {
            Session::flash('error', 'Informasi tidak ditemukan');
            return redirect('/admin/informasi');
        }
        try {
            Informasi::destroy($id);
            Session::flash('success', 'Informasi berhasil dihapus');
            return redirect('/admin/informasi');
        } catch (QueryException $e) {
            Session::flash('errors', 'Informasi gagal dihapus');
            return redirect('/admin/informasi/' . $id);
        }
    }
}
