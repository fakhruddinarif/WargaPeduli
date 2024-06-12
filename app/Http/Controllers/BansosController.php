<?php

namespace App\Http\Controllers;

use App\Models\BantuanSosial;
use App\Models\DetailBantuanSosial;
use App\Models\User;
use App\Services\BansosService;
use App\Services\MabacService;
use App\Services\SawService;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class BansosController extends Controller
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
    private MabacService $mabacService;
    private SawService $sawService;
    private BansosService $bansosService;

    private $valueStatis = [
        ['pendapatan' => 1600000, 'luas_bangunan' => 16, 'jumlah_tanggungan' => 2, 'pajak_bumi' => 100000, 'tagihan_listrik' => 90000],
        ['pendapatan' => 1200000, 'luas_bangunan' => 31, 'jumlah_tanggungan' => 1, 'pajak_bumi' => 25000, 'tagihan_listrik' => 50000],
        ['pendapatan' => 3000000, 'luas_bangunan' => 31, 'jumlah_tanggungan' => 3, 'pajak_bumi' => 55000, 'tagihan_listrik' => 50000],
        ['pendapatan' => 900000, 'luas_bangunan' => 25, 'jumlah_tanggungan' => 2, 'pajak_bumi' => 100000, 'tagihan_listrik' => 130000],
        ['pendapatan' => 2200000, 'luas_bangunan' => 25, 'jumlah_tanggungan' => 4, 'pajak_bumi' => 125000, 'tagihan_listrik' => 110000],
    ];

    protected $column = ['Pendapatan', 'Luas Bangunan', 'Jumlah Tanggungan', 'Pajak Bumi', 'Tagihan Listrik'];

    public function __construct(MabacService $mabacService, SawService $sawService, BansosService $bansosService)
    {
        $this->mabacService = $mabacService;
        $this->sawService = $sawService;
        $this->bansosService = $bansosService;
    }

    public function index()
    {
        $url = $this->url();
        $page = "Bantuan Sosial";
        $activeMenu = "bansos";

        return view('admin.bansos.index', ['url' => $url, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function create()
    {
        $url = $this->url();
        $page = "Bantuan Sosial";
        $activeMenu = "bansos";
        $jenis = ['PKH', 'Pemakanan', 'KIP', 'BPNT', 'PBIJKN'];

        return view('admin.bansos.create', ['url' => $url, 'page' => $page, 'activeMenu' => $activeMenu, 'jenis' => $jenis]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'mulai' => 'required|date',
            'selesai' => 'required|date',
            'jenis' => 'required',
            'kapasitas' => 'required|numeric',
        ]);

        try {
            BantuanSosial::create([
                'tanggal_mulai' => Carbon::parse($request->mulai),
                'tanggal_selesai' => Carbon::parse($request->selesai),
                'jenis' => $request->jenis,
                'kapasitas' => $request->kapasitas,
            ]);
            Session::flash('success', 'Berhasil menambahkan data bantuan sosial');
            return redirect('/admin/bansos');
        } catch (\Exception $e) {
            Session::flash('error', 'Gagal menambahkan data bantuan sosial');
            return redirect('/admin/bansos/create')->withInput();
        }
    }

    public function detail($id)
    {
        $url = $this->url();
        $page = "Bantuan Sosial";
        $activeMenu = "bansos";

        $bansos = BantuanSosial::find($id);
        $jenis = ['PKH', 'Pemakanan', 'KIP', 'BPNT', 'PBIJKN'];
        return view('admin.bansos.detail', ['url' => $url, 'page' => $page, 'activeMenu' => $activeMenu, 'data' => $bansos, 'jenis' => $jenis]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mulai' => 'required|date',
            'selesai' => 'required|date',
            'jenis' => 'required',
            'kapasitas' => 'required|numeric',
        ]);

        try {
            $bansos = BantuanSosial::find($id);
            $bansos->update([
                'tanggal_mulai' => Carbon::parse($request->mulai),
                'tanggal_selesai' => Carbon::parse($request->selesai),
                'jenis' => $request->jenis,
                'kapasitas' => $request->kapasitas,
            ]);
            Session::flash('success', 'Berhasil mengubah data bantuan sosial');
            return redirect('/admin/bansos/' . $id);
        } catch (QueryException $err) {
            Session::flash('error', 'Gagal mengubah data bantuan sosial');
            return redirect('/admin/bansos/' . $id)->withInput();
        }
    }

    public function mabac($id, $number = 1)
    {
        $url = $this->url();
        $page = "Bantuan Sosial";
        $activeMenu = "bansos";

        $bansos = BantuanSosial::find($id);

        $values = DetailBantuanSosial::select('pendapatan', 'jumlah_tanggungan', 'luas_bangunan', 'pajak_bumi', 'tagihan_listrik')
            ->where('bansos_id', $id)
            ->where('status', 'Diterima')
            ->get();
        $keluarga = DetailBantuanSosial::select('nkk', 'alamat', 'nama', 'rukun_tetangga.nomor')
            ->join('user', 'detail_bantuan_sosial.user_id', '=', 'user.id')
            ->join('keluarga', 'user.keluarga_id', '=', 'keluarga.id')
            ->join('warga', 'keluarga.id', '=', 'warga.keluarga_id')
            ->join('rukun_tetangga', 'warga.rt_id', '=', 'rukun_tetangga.id')
            ->where('detail_bantuan_sosial.status', 'Diterima')
            ->where('detail_bantuan_sosial.bansos_id', $id)
            ->where('warga.status_keluarga', 'Kepala Keluarga')
            ->get();

        if (!$values->isEmpty()) {
            $data = $this->mabacService->convert($values);
            $weight = $this->mabacService->getWeight();
            $criteria = $this->mabacService->getCriteriaType();
            $column = $this->column;

            $max = $this->mabacService->getMax($data);
            $min = $this->mabacService->getMin($data);
            $normalization = $this->mabacService->normalization($data, $min, $max);
            $weightedNormalization = $this->mabacService->weightedNormalization($normalization);
            $limit = $this->mabacService->limit($weightedNormalization);
            $distance = $this->mabacService->distance($weightedNormalization, $limit);
            $rank = $this->mabacService->rank($distance);
            arsort($rank);

            Session::put(['rank' => $rank, 'keluarga' => $keluarga]);

            return view('admin.bansos.mabac', ['url' => $url, 'page' => $page, 'activeMenu' => $activeMenu, 'number' => $number, 'bansos' => $bansos, 'keluarga' => $keluarga, 'values' => $values, 'data' => $data, 'weight' => $weight, 'criteria' => $criteria, 'column' => $column, 'max' => $max, 'min' => $min, 'normalization' => $normalization, 'weightedNormalization' => $weightedNormalization, 'limit' => $limit, 'distance' => $distance, 'rank' => $rank]);
        }
        else {
            return view('admin.bansos.mabac', ['url' => $url, 'page' => $page, 'activeMenu' => $activeMenu, 'number' => $number, 'bansos' => $bansos, 'keluarga' => $keluarga, 'values' => $values]);
        }
    }

    public function saw($id, $number = 1)
    {
        $url = $this->url();
        $page = "Bantuan Sosial";
        $activeMenu = "bansos";
        $bansos = BantuanSosial::find($id);
        $values = DetailBantuanSosial::select('pendapatan', 'jumlah_tanggungan', 'luas_bangunan', 'pajak_bumi', 'tagihan_listrik')
            ->where('bansos_id', $id)
            ->where('status', 'Diterima')
            ->get();
        $keluarga = DetailBantuanSosial::select('nkk', 'alamat', 'nama', 'rukun_tetangga.nomor')
            ->join('user', 'detail_bantuan_sosial.user_id', '=', 'user.id')
            ->join('keluarga', 'user.keluarga_id', '=', 'keluarga.id')
            ->join('warga', 'keluarga.id', '=', 'warga.keluarga_id')
            ->join('rukun_tetangga', 'warga.rt_id', '=', 'rukun_tetangga.id')
            ->where('detail_bantuan_sosial.status', 'Diterima')
            ->where('detail_bantuan_sosial.bansos_id', $id)
            ->where('warga.status_keluarga', 'Kepala Keluarga')
            ->get();

        if (!$values->isEmpty()) {
            $weight = $this->sawService->getWeight();
            $criteria = $this->sawService->getCriteriaType();
            $column = $this->column;

            $data = $this->sawService->convert($values);
            $max = $this->sawService->getMax($data);
            $min = $this->sawService->getMin($data);
            $normalization = $this->sawService->normalization($data, $min, $max);
            $rank = $this->sawService->rank($normalization);
            arsort($rank);

            Session::put(['rank' => $rank, 'keluarga' => $keluarga]);

            return view('admin.bansos.saw', ['url' => $url, 'page' => $page, 'activeMenu' => $activeMenu, 'number' => $number, 'keluarga' => $keluarga, 'values' => $values, 'data' => $data, 'weight' => $weight, 'criteria' => $criteria, 'column' => $column, 'max' => $max, 'min' => $min, 'normalization' => $normalization, 'rank' => $rank, 'bansos' => $bansos]);
        }
        else {
            return view('admin.bansos.saw', ['url' => $url, 'page' => $page, 'activeMenu' => $activeMenu, 'number' => $number, 'keluarga' => $keluarga, 'values' => $values, 'bansos' => $bansos]);
        }
    }

    public function downloadMabac($id) {
        $rank = Session::get('rank');
        $keluarga = Session::get('keluarga');
        $bansos = BantuanSosial::find($id);
        $data = [];
        $number = 0;
        foreach ($rank as $key => $value) {
            $data[] = [
                'no' => $number + 1,
                'nkk' => $keluarga[$key]->nkk,
                'nama' => $keluarga[$key]->nama,
                'alamat' => $keluarga[$key]->alamat,
                'rt' => $keluarga[$key]->nomor,
                'nilai' => $value,
                'bansos' => $bansos->jenis,
            ];
            $number++;
        }
        $selected_columns = ['no', 'nkk', 'nama', 'alamat', 'rt', 'nilai', 'bansos'];

        $pdf = app('dompdf.wrapper')->loadView('components.bansos_pdf', ['data' => $data, 'selected_columns' => $selected_columns]);

        return $pdf->download('ranking_mabac.pdf');
    }

    public function downloadSaw($id)
    {
        $rank = Session::get('rank');
        $keluarga = Session::get('keluarga');
        $bansos = BantuanSosial::find($id);
        $data = [];
        $number = 0;
        foreach ($rank as $key => $value) {
            $data[] = [
                'no' => $number + 1,
                'nkk' => $keluarga[$key]->nkk,
                'nama' => $keluarga[$key]->nama,
                'alamat' => $keluarga[$key]->alamat,
                'rt' => $keluarga[$key]->nomor,
                'nilai' => $value,
                'bansos' => $bansos->jenis,
            ];
            $number++;
        }
        $selected_columns = ['no', 'nkk', 'nama', 'alamat', 'rt', 'nilai', 'bansos'];

        $pdf = app('dompdf.wrapper')->loadView('components.bansos_pdf', ['data' => $data, 'selected_columns' => $selected_columns]);

        return $pdf->download('ranking_saw.pdf');
    }

    public function destroy($id)
    {
        try {
            $bansos = BantuanSosial::find($id);
            DetailBantuanSosial::where('bansos_id', $id)->delete();
            $bansos->delete();
            Session::flash('success', 'Berhasil menghapus data bantuan sosial');
            return redirect('/admin/bansos');
        } catch (QueryException $err) {
            Session::flash('error', 'Gagal menghapus data bantuan sosial');
            return redirect('/admin/bansos');
        }
    }

    public function pengajuan($id)
    {
        $url = $this->url();
        $page = "Bantuan Sosial";
        $activeMenu = "bansos";

        $data = DetailBantuanSosial::select('nkk', 'alamat', 'nama', 'rukun_tetangga.nomor', 'detail_bantuan_sosial.id', 'detail_bantuan_sosial.bansos_id')
            ->join('user', 'detail_bantuan_sosial.user_id', '=', 'user.id')
            ->join('keluarga', 'user.keluarga_id', '=', 'keluarga.id')
            ->join('warga', 'keluarga.id', '=', 'warga.keluarga_id')
            ->join('rukun_tetangga', 'warga.rt_id', '=', 'rukun_tetangga.id')
            ->where('detail_bantuan_sosial.status', 'Menunggu Konfirmasi')
            ->where('detail_bantuan_sosial.bansos_id', $id)
            ->where('warga.status_keluarga', 'Kepala Keluarga')
            ->get();

        return view('admin.bansos.pengajuan', ['url' => $url, 'page' => $page, 'activeMenu' => $activeMenu, 'data' => $data]);
    }

    public function storePengajuan(Request $request)
    {
        $request->validate([
            'bansos_id' => 'required|integer',
            'pendapatan' => 'numeric|required',
            'luas_bangunan' => 'numeric|required',
            'jumlah_tanggungan' => 'numeric|required',
            'pajak_bumi' => 'numeric|required',
            'tagihan_listrik' => 'numeric|required'
        ]);

        try {
            $user = Auth::user();
            if ($this->bansosService->pengajuanExist($request->bansos_id, $user->id)) {
                Session::flash('error', 'Anda sudah mengajukan bantuan sosial ini');
                return redirect($this->url());
            }
            DetailBantuanSosial::create([
                'bansos_id' => $request->bansos_id,
                'user_id' => $user->id,
                'pendapatan' => $request->pendapatan,
                'luas_bangunan' => $request->luas_bangunan,
                'jumlah_tanggungan' => $request->jumlah_tanggungan,
                'pajak_bumi' => $request->pajak_bumi,
                'tagihan_listrik' => $request->tagihan_listrik,
                'status' => 'Menunggu Konfirmasi'
            ]);
            Session::flash('success', 'Berhasil menambahkan data pengajuan');
            return redirect($this->url());
        } catch (QueryException $err) {
            Session::flash('error', 'Gagal menambahkan data pengajuan');
            return redirect($this->url());
        }
    }

    public function detailPengajuan($bansosId, $id)
    {
        $detail = DetailBantuanSosial::where('bansos_id', $bansosId)->where('id', $id)->get();
        return response()->json($detail);
    }

    public function terima($id)
    {
        try {
            $user = DetailBantuanSosial::find($id);
            $user->update([
                'status' => 'Diterima'
            ]);
            Session::flash('success', "Sukses menerima bansos");
            return redirect('/rw/bansos/pengajuan/' . $user->bansos_id);
        } catch (QueryException $err) {
            Session::flash('error', "Tidak dapat menerima bansos");
            Log::error($err);
            return redirect('/rw/bansos/pengajuan/' . $user->bansos_id);
        }
    }

    public function tolak($id)
    {
        try {
            $user = DetailBantuanSosial::find($id);
            $user->update([
                'status' => 'Ditolak'
            ]);
            Session::flash('success', "Sukses menolak bansos");
            return redirect('/rw/bansos/pengajuan/' . $user->bansos_id);
        } catch (QueryException $err) {
            Session::flash('error', "Tidak dapat menerima bansos");
            Log::error($err);
            return redirect('/rw/bansos/pengajuan/' . $user->bansos_id);
        }
    }

    public function rekomendasi($keluarga)
    {
        $data = User::join('keluarga', 'user.keluarga_id', '=', 'keluarga.id')
            ->select('user.id', 'pendapatan', 'luas_bangunan', 'jumlah_tanggungan', 'pajak_bumi', 'tagihan_listrik')
            ->where('keluarga.id', $keluarga)
            ->get();
        return response()->json($data);
    }
}
