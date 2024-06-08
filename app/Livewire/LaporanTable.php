<?php

namespace App\Livewire;

use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class LaporanTable extends Component
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
    public $search = '';
    public $filterStatus = '';
    public function render()
    {
        $url = $this->url();
        $laporan = Laporan::query()
            ->join('user', 'laporan.user_id', '=', 'user.id')
            ->join('keluarga', 'user.keluarga_id', '=', 'keluarga.id')
            ->join('warga', 'keluarga.id', '=', 'warga.keluarga_id')
            ->join('rukun_tetangga', 'warga.rt_id', '=', 'rukun_tetangga.id')
            ->select('laporan.id', 'laporan.tanggal', 'laporan.keterangan', 'rukun_tetangga.nomor as rt', 'laporan.status')
            ->distinct()
            ->search($this->search)
            ->when($this->filterStatus, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->paginate($this->perPage);
        $status = ['Menunggu Konfirmasi', 'Diterima', 'Ditolak', 'Diproses', 'Selesai'];
        return view('livewire.laporan-table', ['data' => $laporan, 'status' => $status, 'url' => $url]);
    }
}
