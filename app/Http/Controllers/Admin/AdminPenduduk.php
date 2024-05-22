<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use App\Models\RukunTetangga;
use App\Models\Warga;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Query;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use function Laravel\Prompts\error;

class AdminPenduduk extends Controller
{
    public function index(Request $request)
    {
        $date = Carbon::now()->isoFormat('D MMMM Y');
        $page = "Penduduk";
        $activeMenu = "penduduk";

        $keluarga = $request->has('data')&& $request->get('data') === 'keluarga';
        $warga = $request->has('data')&& $request->get('data') === 'warga';

        if (!$request->has('data')) {
            $keluarga = true;
        }

        return view('admin.penduduk.index', ['page' => $page, 'activeMenu' => $activeMenu, 'date' => $date, 'keluarga' => $keluarga, 'warga' => $warga]);
    }

    public function createKeluarga()
    {
        $date = Carbon::now()->isoFormat('D MMMM Y');
        $page = "Penduduk";
        $activeMenu = "penduduk";

        $pendapatan = [
            '5' => 'Kurang dari Rp. 500.000',
            '4' => 'Rp. 500.000 - Rp. 1.000.000',
            '3' => 'Rp. 1.000.000 - Rp. 2.500.000',
            '2' => 'Rp. 2.500.000 - Rp. 3.500.000',
            '1' => 'Lebih dari Rp. 3.500.000' 
        ];
        $luasBangunan = [
            '5' => 'Kurang dari 12 m²',
            '4' => '12 m² - 20 m²',
            '3' => '20 m² - 30 m²',
            '2' => '30 m² - 35 m²',
            '1' => 'Lebih dari 35 m²'
        ];
        $jumlahTanggungan = [
            '5' => '1 Orang',
            '4' => '2 Orang',
            '3' => '3 Orang',
            '2' => '4 Orang',
            '1' => 'Lebih dari 5 Orang'
        ];
        $pajakBumi = [
            '5' => 'Kurang dari Rp. 20.000',
            '4' => 'Rp. 20.000 - Rp. 50.000',
            '3' => 'Rp. 50.000 - Rp. 75.000',
            '2' => 'Rp. 75.000 - Rp. 120.000',
            '1' => 'Lebih dari Rp. 120.000'
        ];
        $tagihanListrik = [
            '5' => 'Kurang dari Rp. 70.000',
            '4' => 'Rp. 70.000 - Rp. 100.000',
            '3' => 'Rp. 100.000 - Rp. 125.000',
            '2' => 'Rp. 125.000 - Rp. 150.000',
            '1' => 'Lebih dari Rp. 150.000'
        ];

        return view('admin.penduduk.create_keluarga', ['page' => $page, 'activeMenu' => $activeMenu, 'date' => $date, 'pendapatan' => $pendapatan, 'luas_bangunan' => $luasBangunan, 'jumlah_tanggungan' => $jumlahTanggungan, 'pajak_bumi' => $pajakBumi, 'tagihan_listrik' => $tagihanListrik]);
    }

    public function storeKeluarga(Request $request)
    {
        $rules = [
            'dokumen' => 'image|max:2048|nullable|mimes:jpg,png,jpeg,gif,svg',
            'nkk' => 'required|string|unique:keluarga,nkk',
        ];

        try {
            $request->validate($rules);
            $data = $request->all();
            if ($request->hasFile('dokumen')) {
                $nkk = $request->input('nkk');
                $extension = $request->file('dokumen')->extension();
                $dokumen = $request->file('dokumen')->storeAs('dokumen/kk', "{$nkk}.{$extension}", 'local');
                $url = Storage::url($dokumen);
                $data['dokumen'] = $url;
            }
            $request->session()->put('keluarga', $data);
        } catch(QueryException $err) {
            Session::flash('error', 'Terjadi kesalahan saat menyimpan data keluarga: ' . $err->getMessage());
            return redirect('/admin/penduduk/create/keluarga')->withInput();
        }

        return redirect('admin/penduduk/create/warga');
    }

    public function createWarga()
    {
        $date = Carbon::now()->isoFormat('D MMMM Y');
        $page = "Penduduk";
        $activeMenu = "penduduk";

        $rt = RukunTetangga::all();
        $keluarga = Keluarga::all();
        $jenisKelamin = ['Laki-Laki', 'Perempuan'];
        $statusWarga = ['Menetap', 'Pendatang', 'Merantau'];
        $statusKeluarga = ['Kepala Keluarga', 'Istri', 'Anak', 'Cucu', 'Menantu', 'Lainnya'];

        return view('admin.penduduk.create_warga', ['page' => $page, 'activeMenu' => $activeMenu, 'date' => $date, 'rt' => $rt, 'keluarga' => $keluarga, 'jenis_kelamin' => $jenisKelamin, 'status_warga' => $statusWarga, 'status_keluarga' => $statusKeluarga]);
    }

    public function storeWarga(Request $request)
    {
        $rules = [
            'dokumen' => 'image|max:2048|nullable|mimes:jpg,png,jpeg,gif,svg',
            'nik' => 'required|string|unique:warga,nik',
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|max:255|string',
            'status_warga' => 'required|string',
            'status_keluarga' => 'required|string',
            'telepon' => 'string|nullable',
            'keluarga_id' => 'string|nullable',
            'rt_id' => 'integer|required'
        ];

        try {
            $request->validate($rules);
            $data = $request->all();
            if ($request->hasFile('dokumen')) {
                $nik = $request->input('nik');
                $extension = $request->file('dokumen')->extension();
                $dokumen = $request->file('dokumen')->storeAs('dokumen/ktp', "{$nik}.{$extension}", 'local');
                $url = Storage::url($dokumen);
                $data['dokumen'] = $url;
            }
            DB::transaction(function () use ($data) {
                $keluarga = Session::get('keluarga');
                $keluarga = Keluarga::create($keluarga);
                $data['keluarga_id'] = $keluarga->id;
                Warga::create($data);
            });
            Session::flash('success', 'Data Penduduk Berhasil Ditambah');
            return redirect('/admin/penduduk');
        } catch (QueryException $err) {
            Session::flash('errors', 'Terjadi kesalahan saat menyimpan data penduduk: ' . $err->getMessage());
            return redirect('/admin/penduduk/create/warga')->withInput();
        }
    }

    public function detailKeluarga($id)
    {
        $date = Carbon::now()->isoFormat('D MMMM Y');
        $page = "Penduduk";
        $activeMenu = "penduduk";

        $pendapatan = [
            '5' => 'Kurang dari Rp. 500.000',
            '4' => 'Rp. 500.000 - Rp. 1.000.000',
            '3' => 'Rp. 1.000.000 - Rp. 2.500.000',
            '2' => 'Rp. 2.500.000 - Rp. 3.500.000',
            '1' => 'Lebih dari Rp. 3.500.000' 
        ];
        $luasBangunan = [
            '5' => 'Kurang dari 12 m²',
            '4' => '12 m² - 20 m²',
            '3' => '20 m² - 30 m²',
            '2' => '30 m² - 35 m²',
            '1' => 'Lebih dari 35 m²'
        ];
        $jumlahTanggungan = [
            '5' => '1 Orang',
            '4' => '2 Orang',
            '3' => '3 Orang',
            '2' => '4 Orang',
            '1' => 'Lebih dari 5 Orang'
        ];
        $pajakBumi = [
            '5' => 'Kurang dari Rp. 20.000',
            '4' => 'Rp. 20.000 - Rp. 50.000',
            '3' => 'Rp. 50.000 - Rp. 75.000',
            '2' => 'Rp. 75.000 - Rp. 120.000',
            '1' => 'Lebih dari Rp. 120.000'
        ];
        $tagihanListrik = [
            '5' => 'Kurang dari Rp. 70.000',
            '4' => 'Rp. 70.000 - Rp. 100.000',
            '3' => 'Rp. 100.000 - Rp. 125.000',
            '2' => 'Rp. 125.000 - Rp. 150.000',
            '1' => 'Lebih dari Rp. 150.000'
        ];

        $keluarga = Keluarga::with(['warga', 'user'])->find($id);

        return view('admin.penduduk.detail_keluarga', ['page' => $page, 'activeMenu' => $activeMenu, 'date' => $date, 'data' => $keluarga, 'pendapatan' => $pendapatan, 'luas_bangunan' => $luasBangunan, 'jumlah_tanggungan' => $jumlahTanggungan, 'pajak_bumi' => $pajakBumi, 'tagihan_listrik' => $tagihanListrik]);
    }

    public function detailWarga($id)
    {
        $date = Carbon::now()->isoFormat('D MMMM Y');
        $page = "Penduduk";
        $activeMenu = "penduduk";

        $rt = RukunTetangga::all();
        $keluarga = Keluarga::all();
        $warga = Warga::find($id);
        $jenisKelamin = ['Laki-Laki', 'Perempuan'];
        $statusWarga = ['Menetap', 'Pendatang', 'Merantau'];
        $statusKeluarga = ['Kepala Keluarga', 'Istri', 'Anak', 'Cucu', 'Menantu', 'Lainnya'];


        return view('admin.penduduk.detail_warga', ['page' => $page, 'activeMenu' => $activeMenu, 'date' => $date, 'data' => $warga, 'jenis_kelamin' => $jenisKelamin, 'status_warga' => $statusWarga, 'status_keluarga' => $statusKeluarga, 'rt' => $rt, 'keluarga' => $keluarga]);
    }

    public function editKeluarga($id)
    {

    }

    public function editWarga($id)
    {

    }
}
