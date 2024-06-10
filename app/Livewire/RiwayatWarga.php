<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class RiwayatWarga extends Component
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
        $data = \App\Models\RiwayatWarga::join('warga', 'riwayat_warga.warga_id', '=', 'warga.id')
            ->select('nik', 'nama', 'tanggal', 'status', 'riwayat_warga.id', 'warga_id', 'surat')
            ->paginate($this->perPage);
        return view('livewire.riwayat-warga', [
            'url' => $url,
            'data' => $data
        ]);
    }
}
