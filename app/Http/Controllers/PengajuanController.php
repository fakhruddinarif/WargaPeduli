<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\Pengajuan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
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
    public function store(Request $request)
    {
        $request->validate([
            'dokumen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nik' => 'required|string',
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'status_keluarga' => 'required|string',
            'ibu_kandung' => 'required|string',
            'telepon' => 'nullable|string',
            ]);
        try {
            $user = Auth::user();
            $result = Keluarga::join('warga', 'keluarga.id', '=', 'warga.keluarga_id')
                ->where('keluarga.id', $user->keluarga_id)
                ->select('keluarga.nkk', 'warga.alamat', 'warga.status_warga', 'warga.rt_id')
                ->distinct()
                ->get();

            $data = $request->all();
            if ($request->hasFile('dokumen')) {
                $nik = $request->input('nik');
                $extension = $request->file('dokumen')->extension();
                $dokumen = $request->file('dokumen')->storeAs('pengajuan/ktp', $nik . '.' . $extension, 'public');
                $url = Storage::url($dokumen);
                $data['dokumen'] = $url;
            }
            Pengajuan::create([
                'nkk' => $result[0]->nkk,
                'nik' => $data['nik'],
                'dokumen_ktp' => $data['dokumen'],
                'nama' => $data['nama'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'tempat_lahir' => $data['tempat_lahir'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'alamat' => $result[0]->alamat,
                'ibu_kandung' => $data['ibu_kandung'],
                'status_warga' => $result[0]->status_warga,
                'status_keluarga' => $data['status_keluarga'],
                'telepon' => $data['telepon'],
                'rt_id' => $result[0]->rt_id,
                'status' => 'Menunggu Konfirmasi',
                'status_pengajuan' => 'Warga',
            ]);

            Session::flash('success', 'Berhasil menambahkan data pengajuan');
            return redirect($this->url() . '/profil');
        } catch (QueryException $err) {
            Session::flash('error', 'Gagal menambahkan data pengajuan' . $err->getMessage());
            return redirect()->back();
        }
    }

    public function terima($id)
    {
        try {
            Pengajuan::where('id', $id)->update(['status' => 'Diterima']);
            Session::flash('success', 'Berhasil menerima pengajuan');
            return redirect($this->url() . '/');
        } catch (QueryException $err) {
            Session::flash('error', 'Gagal menerima pengajuan' . $err->getMessage());
            return redirect()->back();
        }
    }

    public function tolak($id)
    {
        try {
            Pengajuan::where('id', $id)->update(['status' => 'Ditolak']);
            Session::flash('success', 'Berhasil menolak pengajuan');
            return redirect($this->url() . '/');
        } catch (QueryException $err) {
            Session::flash('error', 'Gagal menolak pengajuan' . $err->getMessage());
            return redirect()->back();
        }
    }
}
