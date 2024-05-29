<?php

namespace App\Livewire;

use App\Models\RukunTetangga;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AkunTable extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $search = '';
    public $rtFilter = '';

    public function render()
    {
        $users = User::select('user.id', 'username', 'l.nama as level', 'k.id as keluarga', 'k.nkk as nkk', \DB::raw('MIN(alamat) as alamat'))
            ->join('level as l', 'user.level_id', '=', 'l.id')
            ->join('keluarga as k', 'user.keluarga_id', '=', 'k.id')
            ->join('warga as w', 'k.id', '=', 'w.keluarga_id')
            ->where('user.level_id', '<>', 1)
            ->search($this->search)
            ->when($this->rtFilter, function ($query, $rt) {
                return $query->where('w.rt_id', $rt);
            })
            ->groupBy('user.id', 'username', 'l.nama', 'k.id')
            ->paginate($this->perPage);
        $rt = RukunTetangga::all();
        return view('livewire.akun-table', ['data' => $users, 'rt' => $rt]);
    }
}
