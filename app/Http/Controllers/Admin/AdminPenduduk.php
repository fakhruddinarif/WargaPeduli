<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use App\Models\RukunTetangga;
use App\Models\Warga;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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

        return view('admin.penduduk.create_keluarga', ['page' => $page, 'activeMenu' => $activeMenu, 'date' => $date]);
    }

    public function storeKeluarga(Request $request)
    {
        $request->validate([
            'dokumen' => 'string|max:255',
            'nkk' => 'required|string|unique:keluarga,nkk',
            'pendapatan' => 'integer',
            'luas_bangunan' => 'integer',
            'jumlah_tanggungan' => 'integer',
            'pajak_bumi' => 'integer'
        ]);

        return redirect()->route('admin/penduduk/create/warga');
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
            $file = $request->file('dokumen');
            $name = $file->getClientOriginalName();

                // Save the file to the 'dokumen' disk (which corresponds to storage/app/dokumen)
            $path = $file->storeAs('dokumen', $name);

            $requestData = $request->all();
            DB::transaction(function () use ($requestData) {
                Warga::create($requestData);
            });
            Session::flash('success', 'Data Penduduk Berhasil Ditambah');
            return redirect('/admin/penduduk');
        } catch (QueryException $err) {
            Session::flash('error', 'Terjadi kesalahan saat menyimpan data penduduk: ' . $err->getMessage());
            return redirect('/admin/penduduk/create_warga')->withInput();
        }
    }

    public function detailKeluarga()
    {

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

    public function create()
    {
        $date = Carbon::now()->isoFormat('D MMMM Y');
        $page = "Penduduk";
        $activeMenu = "penduduk";

        return view('admin.penduduk.create', ['page' => $page, 'activeMenu' => $activeMenu, 'date' => $date]);
    }

    public function store(Request $request)
    {

    }
}
