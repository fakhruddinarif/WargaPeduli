<?php

namespace App\Livewire;

use App\Models\RukunTetangga;
use App\Models\Warga;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class WargaTable extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $rtFilter;

    public function render()
    {
        $rt = ['1', '2', '3', '4', '5', '6', '7', '8'];
        try {
            $warga = Warga::search($this->search)
                ->when($this->rtFilter, function ($query, $rt) {
                    return $query->where('rt_id', $this->rtFilter);
                })->paginate($this->perPage);
            return view('livewire.warga-table', ['data' => $warga, 'rt' => $rt]);
        } catch (\Exception $err) {
            Log::error('Error fetching data: ' . $err->getMessage());
            Session::flash('error', 'Terjadi kesalahan saat memuat data warga.');
            return view('livewire.warga-table', ['data' => [], 'rt' => $rt]);
        }
    }
}
