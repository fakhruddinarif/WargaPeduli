<?php

namespace App\Http\Controllers;

use App\Models\BantuanSosial;
use App\Models\DetailBantuanSosial;
use App\Service\MabacService;
use App\Service\SawService;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BansosController extends Controller
{
    private MabacService $mabacService;
    private SawService $sawService;

    private $valueStatis = [
        ['pendapatan' => 1600000, 'luas_bangunan' => 16, 'jumlah_tanggungan' => 2, 'pajak_bumi' => 100000, 'tagihan_listrik' => 90000],
        ['pendapatan' => 1200000, 'luas_bangunan' => 31, 'jumlah_tanggungan' => 1, 'pajak_bumi' => 25000, 'tagihan_listrik' => 50000],
        ['pendapatan' => 3000000, 'luas_bangunan' => 31, 'jumlah_tanggungan' => 3, 'pajak_bumi' => 55000, 'tagihan_listrik' => 50000],
        ['pendapatan' => 900000, 'luas_bangunan' => 25, 'jumlah_tanggungan' => 2, 'pajak_bumi' => 100000, 'tagihan_listrik' => 130000],
        ['pendapatan' => 2200000, 'luas_bangunan' => 25, 'jumlah_tanggungan' => 4, 'pajak_bumi' => 125000, 'tagihan_listrik' => 110000],
    ];

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

    public function mabac($id, $number = 1)
    {
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

            return view('admin.bansos.mabac', ['page' => $page, 'activeMenu' => $activeMenu, 'number' => $number, 'bansos' => $bansos, 'keluarga' => $keluarga, 'values' => $values, 'data' => $data, 'weight' => $weight, 'criteria' => $criteria, 'column' => $column, 'max' => $max, 'min' => $min, 'normalization' => $normalization, 'weightedNormalization' => $weightedNormalization, 'limit' => $limit, 'distance' => $distance, 'rank' => $rank]);
        }
        else {
            return view('admin.bansos.mabac', ['page' => $page, 'activeMenu' => $activeMenu, 'number' => $number, 'bansos' => $bansos, 'keluarga' => $keluarga, 'values' => $values]);
        }
    }

    public function saw($id, $number = 1)
    {
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

            return view('admin.bansos.saw', ['page' => $page, 'activeMenu' => $activeMenu, 'number' => $number, 'keluarga' => $keluarga, 'values' => $values, 'data' => $data, 'weight' => $weight, 'criteria' => $criteria, 'column' => $column, 'max' => $max, 'min' => $min, 'normalization' => $normalization, 'rank' => $rank, 'bansos' => $bansos]);
        }
        else {
            return view('admin.bansos.saw', ['page' => $page, 'activeMenu' => $activeMenu, 'number' => $number, 'keluarga' => $keluarga, 'values' => $values, 'bansos' => $bansos]);
        }
    }

    public function destroy($id)
    {
        try {
            $bansos = BantuanSosial::find($id);
            $bansos->delete();
            Session::flash('success', 'Berhasil menghapus data bantuan sosial');
            return redirect('/admin/bansos');
        } catch (QueryException $err) {
            Session::flash('error', 'Gagal menghapus data bantuan sosial');
            return redirect('/admin/bansos');
        }
    }
}
