<?php

namespace App\Http\Controllers;

use App\Models\RiwayatKeluarga;
use App\Models\RiwayatWarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class RiwayatPendudukController extends Controller
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
    public function riwayatKeluarga()
    {
        $page = "Penduduk";
        $activeMenu = "penduduk";
        $url = $this->url();
        return view('admin.penduduk.riwayat_keluarga', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'url' => $url
            ]);
    }

    public function riwayatWarga()
    {
        $page = "Penduduk";
        $activeMenu = "penduduk";
        $url = $this->url();

        return view('admin.penduduk.riwayat_warga', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'url' => $url
            ]);
    }

    public function downloadRiwayatKeluarga($id)
    {
        $data = RiwayatKeluarga::find($id);
        if (!$data->surat) {
            return back()->with('error', 'File not found!');
        }
        $suratPath = str_replace('/storage/', '', $data->surat);
        $file = Storage::url($suratPath); // Menggunakan Storage::url()
        if (Storage::disk('public')->exists($suratPath)) {
            return Response::redirectTo($file); // Menggunakan Response::redirectTo() untuk mengarahkan ke URL file
        }

        return back()->with('error', 'File not found!');
    }

    public function downloadRiwayatWarga($id)
    {
        $data = RiwayatWarga::find($id);
        if (!$data->surat) {
            return back()->with('error', 'File not found!');
        }
        $suratPath = str_replace('/storage/', '', $data->surat);
        $file = Storage::url($suratPath); // Menggunakan Storage::url()
        if (Storage::disk('public')->exists($suratPath)) {
            return Response::redirectTo($file); // Menggunakan Response::redirectTo() untuk mengarahkan ke URL file
        }
        return back()->with('error', 'File not found!');
    }
}
