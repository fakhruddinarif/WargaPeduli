<?php

namespace App\Livewire;

use App\Models\RukunTetangga;
use App\Models\User;
use App\Models\Warga;
use Illuminate\Support\Facades\Auth;
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
        $rt = RukunTetangga::all();
        $url = $this->url();
        try {
            if ($url == 'rt') {
                $user = Auth::user();
                $rtId = User::select('rt_id')
                    ->distinct()
                    ->join('keluarga', 'user.keluarga_id', '=', 'keluarga.id')
                    ->join('warga', 'keluarga.id', '=', 'warga.keluarga_id')
                    ->where('keluarga.id', $user->keluarga_id)
                    ->get();
                $warga = Warga::search($this->search)
                    ->whereIn('rt_id', $rtId)->paginate($this->perPage);
            } else {
                $warga = Warga::search($this->search)
                    ->when($this->rtFilter, function ($query, $rt) {
                        return $query->where('rt_id', $this->rtFilter);
                    })->paginate($this->perPage);
            }
            return view('livewire.warga-table', ['data' => $warga, 'rt' => $rt, 'url' => $url]);
        } catch (\Exception $err) {
            Log::error('Error fetching data: ' . $err->getMessage());
            Session::flash('error', 'Terjadi kesalahan saat memuat data warga.');
            return view('livewire.warga-table', ['data' => [], 'rt' => $rt, 'url' => $url]);
        }
    }
}
