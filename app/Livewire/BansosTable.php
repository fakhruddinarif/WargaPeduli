<?php

namespace App\Livewire;

use App\Models\BantuanSosial;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class BansosTable extends Component
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

    use WithPagination;
    public $perPage = 10;
    public $jenisFilter = '';

    public function render()
    {
        $url = $this->url();
        $bansos = BantuanSosial::where('jenis', 'like', '%' . $this->jenisFilter . '%')
            ->paginate($this->perPage);
        $jenis = ['PKH', 'Pemakanan', 'KIP', 'BPNT', 'PBIJKN'];
        return view('livewire.bansos-table', ['data' => $bansos, 'jenis' => $jenis, 'url' => $url]);
    }

    public function setJenisFilter($value)
    {
        $this->jenisFilter = $value;
    }
}
