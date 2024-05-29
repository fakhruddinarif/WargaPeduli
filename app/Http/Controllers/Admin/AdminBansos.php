<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BantuanSosial;
use App\Models\Keluarga;
use App\Service\MabacService;
use App\Service\SawService;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminBansos extends Controller
{
    private MabacService $mabacService;
    private SawService $sawService;

    protected $column = ['Pendapatan', 'Luas Bangunan', 'Jumlah Tanggungan', 'Pajak Bumi', 'Tagihan Listrik'];

    public function __construct(MabacService $mabacService, SawService $sawService)
    {
        $this->mabacService = $mabacService;
        $this->sawService = $sawService;
    }

    public function index()
    {
        $page = "Bantuan Sosial";
        $activeMenu = "bansos";

        return view('admin.bansos.index', ['page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function create()
    {
        $page = "Bantuan Sosial";
        $activeMenu = "bansos";
        $jenis = ['PKH', 'Pemakanan', 'KIP', 'BPNT', 'PBIJKN'];

        return view('admin.bansos.create', ['page' => $page, 'activeMenu' => $activeMenu, 'jenis' => $jenis]);
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
        $page = "Bantuan Sosial";
        $activeMenu = "bansos";

        $bansos = BantuanSosial::find($id);
        $jenis = ['PKH', 'Pemakanan', 'KIP', 'BPNT', 'PBIJKN'];
        return view('admin.bansos.detail', ['page' => $page, 'activeMenu' => $activeMenu, 'data' => $bansos, 'jenis' => $jenis]);
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

    public function mabac($id)
    {
        $page = "Bantuan Sosial";
        $activeMenu = "bansos";
        $data = Keluarga::select('pendapatan', 'luas_bangunan', 'jumlah_tanggungan', 'pajak_bumi', 'tagihan_listrik')
            ->whereNotNull('pendapatan')
            ->whereNotNull('luas_bangunan')
            ->whereNotNull('jumlah_tanggungan')
            ->whereNotNull('pajak_bumi')
            ->whereNotNull('tagihan_listrik')
            ->get();

        $keluarga = Keluarga::join('warga', 'keluarga.id', '=', 'warga.keluarga_id')
            ->join('rukun_tetangga as rt', 'warga.rt_id', '=', 'rt.id')
            ->whereNotNull('pendapatan')
            ->whereNotNull('luas_bangunan')
            ->whereNotNull('jumlah_tanggungan')
            ->whereNotNull('pajak_bumi')
            ->whereNotNull('tagihan_listrik')
            ->where('warga.status_keluarga', 'Kepala Keluarga')
            ->select('nkk', 'alamat', 'nama', 'rt.nomor')
            ->get();

        /*$data = [
            ['pendapatan' => 3, 'luas_bangunan' => 4, 'jumlah_tanggungan' => 2, 'pajak_bumi' => 2, 'tagihan_listrik' => 4],
            ['pendapatan' => 4, 'luas_bangunan' => 2, 'jumlah_tanggungan' => 1, 'pajak_bumi' => 4, 'tagihan_listrik' => 5],
            ['pendapatan' => 2, 'luas_bangunan' => 2, 'jumlah_tanggungan' => 3, 'pajak_bumi' => 3, 'tagihan_listrik' => 5],
            ['pendapatan' => 5, 'luas_bangunan' => 3, 'jumlah_tanggungan' => 2, 'pajak_bumi' => 2, 'tagihan_listrik' => 2],
            ['pendapatan' => 3, 'luas_bangunan' => 3, 'jumlah_tanggungan' => 4, 'pajak_bumi' => 1, 'tagihan_listrik' => 3],
        ];*/

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
        //dd($keluarga, $max, $min, $normalization, $weightedNormalization, $limit, $distance, $rank);

        return view('admin.bansos.mabac', ['page' => $page, 'activeMenu' => $activeMenu, 'keluarga' => $keluarga, 'max' => $max, 'min' => $min, 'normalization' => $normalization, 'weightedNormalization' => $weightedNormalization, 'limit' => $limit, 'distance' => $distance, 'rank' => $rank, 'weight' => $weight, 'criteria' => $criteria, 'column' => $column, 'data' => $data]);
    }

    public function saw($id)
    {
        $page = "Bantuan Sosial";
        $activeMenu = "bansos";
        $data = Keluarga::select('pendapatan', 'luas_bangunan', 'jumlah_tanggungan', 'pajak_bumi', 'tagihan_listrik')
            ->whereNotNull('pendapatan')
            ->whereNotNull('luas_bangunan')
            ->whereNotNull('jumlah_tanggungan')
            ->whereNotNull('pajak_bumi')
            ->whereNotNull('tagihan_listrik')
            ->get();
        $keluarga = Keluarga::join('warga', 'keluarga.id', '=', 'warga.keluarga_id')
            ->join('rukun_tetangga as rt', 'warga.rt_id', '=', 'rt.id')
            ->whereNotNull('pendapatan')
            ->whereNotNull('luas_bangunan')
            ->whereNotNull('jumlah_tanggungan')
            ->whereNotNull('pajak_bumi')
            ->whereNotNull('tagihan_listrik')
            ->where('warga.status_keluarga', 'Kepala Keluarga')
            ->select('nkk', 'alamat', 'nama', 'rt.nomor')
            ->get();

        $weight = $this->sawService->getWeight();
        $criteria = $this->sawService->getCriteriaType();
        $column = $this->column;
        /*$data = [
            ['pendapatan' => 3, 'luas_bangunan' => 4, 'jumlah_tanggungan' => 2, 'pajak_bumi' => 2, 'tagihan_listrik' => 4],
            ['pendapatan' => 4, 'luas_bangunan' => 2, 'jumlah_tanggungan' => 1, 'pajak_bumi' => 4, 'tagihan_listrik' => 5],
            ['pendapatan' => 2, 'luas_bangunan' => 2, 'jumlah_tanggungan' => 3, 'pajak_bumi' => 3, 'tagihan_listrik' => 5],
            ['pendapatan' => 5, 'luas_bangunan' => 3, 'jumlah_tanggungan' => 2, 'pajak_bumi' => 2, 'tagihan_listrik' => 2],
            ['pendapatan' => 3, 'luas_bangunan' => 3, 'jumlah_tanggungan' => 4, 'pajak_bumi' => 1, 'tagihan_listrik' => 3],
        ];*/

        $max = $this->sawService->getMax($data);
        $min = $this->sawService->getMin($data);
        $normalization = $this->sawService->normalization($data, $min, $max);
        $rank = $this->sawService->rank($normalization);
        arsort($rank);

        return view('admin.bansos.saw', ['data' => $data, 'max' => $max, 'min' => $min, 'normalization' => $normalization, 'rank' => $rank, 'keluarga' => $keluarga, 'weight' => $weight, 'criteria' => $criteria, 'column' => $column, 'page' => $page, 'activeMenu' => $activeMenu]);
    }
}
