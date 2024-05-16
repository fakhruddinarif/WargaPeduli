<?php

namespace App\Livewire\Penduduk;

use App\Models\Keluarga;
use App\Models\RukunTetangga;
use App\Models\Warga;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPenduduk extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $search = '';
    public $isKeluarga = true;
    public $isWarga = false;
    public $data = null;

    public $rtFilter = '';

    public function render()
    {
        $rt = RukunTetangga::all();

        $warga = Warga::search($this->search)
            ->when($this->rtFilter, function ($query, $rt) {
                return $query->where('rt_id', $this->rtFilter);
            })->paginate($this->perPage);

        $keluarga = Keluarga::query()
        ->join('warga', 'keluarga.id', '=', 'warga.keluarga_id')
        ->join('warga AS wargas', 'keluarga.id', '=', 'wargas.keluarga_id')
        ->where('warga.status_keluarga', 'Kepala Keluarga')
        ->selectRaw('keluarga.id, keluarga.nkk, warga.nama, COUNT(wargas.nik) AS jumlah_anggota, warga.alamat')
        ->groupBy('keluarga.nkk', 'warga.nama', 'warga.alamat')
        ->search($this->search)
        ->when($this->rtFilter, function ($query, $rt) {
            return $query->where('warga.rt_id', $this->rt->id);
        });

        if ($this->isKeluarga) {
            $this->data = $keluarga;
        }

        if ($this->isWarga) {
            $this->data = $warga;
        }
        return view('livewire.penduduk.index-penduduk', ['data' => $this->data, 'rt' => $rt]);
    }
}
