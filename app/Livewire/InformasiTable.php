<?php

namespace App\Livewire;

use App\Models\Informasi;
use Livewire\Component;
use Livewire\WithPagination;

class InformasiTable extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $search = '';
    public $filterJenis = '';
    public function render()
    {
        $informasi = Informasi::select('id', 'judul', 'jenis', 'keterangan', 'tanggal')
            ->search($this->search)
            ->when($this->filterJenis, function ($query, $jenis) {
                return $query->where('jenis', $jenis);
            })
            ->paginate($this->perPage);
        $jenis = ['Pengumuman', 'Berita', 'Kegiatan'];
        return view('livewire.informasi-table', ['data' => $informasi, 'jenis' => $jenis]);
    }
}
