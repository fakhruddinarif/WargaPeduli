<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class RiwayatKeluarga extends Component
{
    use WithPagination;
    public $perPage = 10;
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


    public function render()
    {
        $url = $this->url();
        $data = \App\Models\RiwayatKeluarga::join('keluarga', 'riwayat_keluarga.keluarga_id', '=', 'keluarga.id')
            ->join('warga', 'keluarga.id', '=', 'warga.keluarga_id')
            ->select('nkk', 'nama', 'tanggal', 'status', 'riwayat_keluarga.keluarga_id', 'riwayat_keluarga.id', 'surat')
            ->where('keluarga.id', '9c3dc33f-3ab4-45b5-b693-504a94f62885')
            ->where('warga.status_keluarga', 'Kepala Keluarga')
            ->paginate($this->perPage);
        return view('livewire.riwayat-keluarga', [
            'data' => $data,
            'url' => $url
        ]);
    }
}
