<?php

namespace App\Livewire;

use App\Models\Keluarga;
use App\Models\RukunTetangga;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class KeluargaTable extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $search = '';
    public $rtFilter = '';

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

        if ($url == 'admin' || $url == 'rw') {
            $keluarga = Keluarga::query()
                ->join('warga', 'keluarga.id', '=', 'warga.keluarga_id')
                ->join('warga AS warga_second', 'keluarga.id', '=', 'warga_second.keluarga_id')
                ->where('warga.status_keluarga', 'Kepala Keluarga')
                ->where('warga.deleted_at', null)
                ->selectRaw('keluarga.id, keluarga.nkk, warga.nama, COUNT(warga_second.nik) AS jumlah_anggota, warga.alamat')
                ->groupBy('keluarga.nkk', 'warga.nama', 'warga.alamat')
                ->search($this->search)
                ->when($this->rtFilter, function ($query, $rt) {
                    return $query->where('warga.rt_id', $this->rtFilter);
                })
                ->paginate($this->perPage);
        }
        else {
            $user = Auth::user();
            $rt_id = User::select('rt_id')
                ->distinct()
                ->join('keluarga', 'user.keluarga_id', '=', 'keluarga.id')
                ->join('warga', 'keluarga.id', '=', 'warga.keluarga_id')
                ->where('keluarga.id', $user->keluarga_id)
                ->pluck('rt_id')
                ->first();
            $keluarga = Keluarga::query()
                ->join('warga', 'keluarga.id', '=', 'warga.keluarga_id')
                ->join('warga AS warga_second', 'keluarga.id', '=', 'warga_second.keluarga_id')
                ->where('warga.status_keluarga', 'Kepala Keluarga')
                ->selectRaw('keluarga.id, keluarga.nkk, warga.nama, COUNT(warga_second.nik) AS jumlah_anggota, warga.alamat')
                ->groupBy('keluarga.nkk', 'warga.nama', 'warga.alamat')
                ->search($this->search)
                ->where('warga.rt_id', $rt_id)
                ->paginate($this->perPage);
        }
        $rt = RukunTetangga::all();
        return view('livewire.keluarga-table', ['data' => $keluarga, 'rt' => $rt, 'url' => $url]);
    }
}
