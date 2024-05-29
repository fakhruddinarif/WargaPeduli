<?php

namespace App\Livewire;

use App\Models\BantuanSosial;
use Livewire\Component;
use Livewire\WithPagination;

class BansosTable extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $jenisFilter = '';

    public function render()
    {
        $bansos = BantuanSosial::where('jenis', 'like', '%' . $this->jenisFilter . '%')
            ->paginate($this->perPage);
        $jenis = ['PKH', 'Pemakanan', 'KIP', 'BPNT', 'PBIJKN'];
        return view('livewire.bansos-table', ['data' => $bansos, 'jenis' => $jenis]);
    }

    public function setJenisFilter($value)
    {
        $this->jenisFilter = $value;
    }
}
