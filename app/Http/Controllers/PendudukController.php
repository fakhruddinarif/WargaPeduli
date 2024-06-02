<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\RukunTetangga;
use App\Models\Warga;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PendudukController extends Controller
{
    protected $rulesKeluarga = [
        'dokumen' => 'image|max:2048|nullable|mimes:jpg,png,jpeg,gif,svg',
        'nkk' => 'required|string|unique:keluarga,nkk',
        'pendapatan' => 'numeric|nullable',
        'luas_bangunan' => 'numeric|nullable',
        'jumlah_tanggungan' => 'numeric|nullable',
        'pajak_bumi' => 'numeric|nullable',
        'tagihan_listrik' => 'numeric|nullable'
    ];

    public function index(Request $request)
    {
        $page = "Penduduk";
        $activeMenu = "penduduk";

        $keluarga = $request->has('data')&& $request->get('data') === 'keluarga';
        $warga = $request->has('data')&& $request->get('data') === 'warga';

        if (!$request->has('data')) {
            $keluarga = true;
        }

        return view('admin.penduduk.index', ['page' => $page, 'activeMenu' => $activeMenu, 'keluarga' => $keluarga, 'warga' => $warga]);
    }

    public function createKeluarga()
    {
        $page = "Penduduk";
        $activeMenu = "penduduk";

        return view('admin.penduduk.create_keluarga', ['page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function storeKeluarga(Request $request)
    {
        $request->validate($this->rulesKeluarga);
        try {
            $data = $request->all();
            if ($request->hasFile('dokumen')) {
                $nkk = $request->input('nkk');
                $extension = $request->file('dokumen')->extension();
                $dokumen = $request->file('dokumen')->storeAs('dokumen/kk', "{$nkk}.{$extension}", 'public');
                $url = Storage::url($dokumen);
                $data['dokumen'] = $url;
            }
            $request->session()->put('keluarga', $data);
        } catch(QueryException $err) {
            Session::flash('error', 'Terjadi kesalahan saat menyimpan data keluarga: ' . $err->getMessage());
            return redirect('/admin/penduduk/create/keluarga')->withInput();
        }

        return redirect('admin/penduduk/create/warga/?create=keluarga');
    }

    public function createWarga(Request $request)
    {
        $page = "Penduduk";
        $activeMenu = "penduduk";

        $isCreateKeluarga = $request->has('create') && $request->get('create') === 'keluarga';
        if (!$request->has('create')) {
            $isCreateKeluarga = false;
        }

        $rt = RukunTetangga::all();
        $keluarga = Keluarga::all();
        $jenisKelamin = ['Laki-Laki', 'Perempuan'];
        $statusWarga = ['Menetap', 'Pendatang', 'Merantau'];
        $statusKeluarga = ['Kepala Keluarga', 'Istri', 'Anak', 'Cucu', 'Menantu', 'Lainnya'];

        return view('admin.penduduk.create_warga', ['page' => $page, 'activeMenu' => $activeMenu, 'rt' => $rt, 'keluarga' => $keluarga, 'jenis_kelamin' => $jenisKelamin, 'status_warga' => $statusWarga, 'status_keluarga' => $statusKeluarga, 'isCreateKeluarga' => $isCreateKeluarga]);
    }

    public function storeWarga(Request $request)
    {
        $rules = [
            'dokumen.*' => 'image|max:2048|nullable|mimes:jpg,png,jpeg,gif,svg',
            'nik.*' => 'required|unique:warga,nik|string',
            'nama.*' => 'required|max:100|string',
            'jenis_kelamin.*' => 'required|string',
            'tempat_lahir.*' => 'required|string',
            'tanggal_lahir.*' => 'required|date',
            'alamat.*' => 'required|max:255|string',
            'ibu_kandung.*' => 'required|string',
            'status_warga.*' => 'required|string',
            'status_keluarga.*' => 'required|string',
            'telepon.*' => 'nullable|string',
            'keluarga_id.*' => 'nullable|string',
            'rt_id.*' => 'required|integer'
        ];
        $isCreateKeluarga = $request->has('create') && $request->get('create') === 'keluarga';

        try {
            $request->validate($rules);

            // Get session keluarga
            $keluarga = Session::get('keluarga');

            // Create keluarga
            if ($isCreateKeluarga) {
                $keluarga = Keluarga::create($keluarga);
            }

            // Create warga
            for ($i = 0; $i < count($request->nik); $i++) {
                $data = [
                    'nik' => $request->nik[$i],
                    'nama' => $request->nama[$i],
                    'jenis_kelamin' => $request->jenis_kelamin[$i],
                    'tempat_lahir' => $request->tempat_lahir[$i],
                    'tanggal_lahir' => $request->tanggal_lahir[$i],
                    'alamat' => $request->alamat[$i],
                    'ibu_kandung' => $request->ibu_kandung[$i],
                    'status_warga' => $request->status_warga[$i],
                    'status_keluarga' => $request->status_keluarga[$i],
                    'telepon' => $request->telepon[$i],
                    'rt_id' => $request->rt_id[$i],
                    'keluarga_id' => null
                ];
                if ($request->hasFile('dokumen')) {
                    $nik = $request->input('nik')[$i];
                    $extension = $request->file('dokumen')[$i]->extension();
                    $dokumen = $request->file('dokumen')[$i]->storeAs('dokumen/ktp', "{$nik}.{$extension}", 'public');
                    $url = Storage::url($dokumen);
                    $data['dokumen'] = $url;
                }
                if ($isCreateKeluarga) {
                    $data['keluarga_id'] = $keluarga->id;
                } else {
                    $data['keluarga_id'] = $request->keluarga_id[$i];
                }
                Warga::create($data);
            }

            // Clear session keluarga and flash success
            $request->session()->forget('keluarga');
            Session::flash('success', 'Data Penduduk Berhasil Ditambah');
            return redirect('/admin/penduduk');
        } catch (QueryException $err) {
            Session::flash('errors', 'Terjadi kesalahan saat menyimpan data penduduk: ' . $err->getMessage());
            return redirect('/admin/penduduk/create/warga')->withInput();
        }
    }

    public function detailKeluarga($id)
    {
        $page = "Penduduk";
        $activeMenu = "penduduk";

        $keluarga = Keluarga::with(['warga', 'user'])->find($id);

        return view('admin.penduduk.detail_keluarga', ['page' => $page, 'activeMenu' => $activeMenu, 'data' => $keluarga]);
    }

    public function detailWarga($id)
    {
        $page = "Penduduk";
        $activeMenu = "penduduk";

        $rt = RukunTetangga::all();
        $keluarga = Keluarga::all();
        $warga = Warga::find($id);
        $jenisKelamin = ['Laki-Laki', 'Perempuan'];
        $statusWarga = ['Menetap', 'Pendatang', 'Merantau'];
        $statusKeluarga = ['Kepala Keluarga', 'Istri', 'Anak', 'Cucu', 'Menantu', 'Lainnya'];


        return view('admin.penduduk.detail_warga', ['page' => $page, 'activeMenu' => $activeMenu, 'data' => $warga, 'jenis_kelamin' => $jenisKelamin, 'status_warga' => $statusWarga, 'status_keluarga' => $statusKeluarga, 'rt' => $rt, 'keluarga' => $keluarga]);
    }

    public function updateKeluarga(Request $request ,$id)
    {
        $this->rulesKeluarga['nkk'] = 'required|string|unique:keluarga,nkk,' . $id;
        $request->validate($this->rulesKeluarga);
        try {
            $data = $request->all();
            if ($request->hasFile('dokumen')) {
                $nkk = $request->input('nkk');
                $extension = $request->file('dokumen')->extension();
                $dokumen = $request->file('dokumen')->storeAs('dokumen/kk', "{$nkk}.{$extension}", 'public');
                $url = Storage::url($dokumen);
                $data['dokumen'] = $url;
            }
            $keluarga = Keluarga::find($id);
            $keluarga->update($data);
            Session::flash('success', 'Data Keluarga Berhasil Diperbarui');
            return redirect('/admin/penduduk/keluarga/' . $id);
        } catch (QueryException $err) {
            Session::flash('error', 'Terjadi kesalahan saat memperbarui data keluarga: ' . $err->getMessage());
            return redirect('/admin/penduduk/keluarga/' . $id)->withInput();
        }
    }

    public function updateWarga(Request $request, $id)
    {
        $rules = [
            'dokumen.*' => 'image|max:2048|nullable|mimes:jpg,png,jpeg,gif,svg',
            'nik.*' => 'required|unique:warga,nik|string',
            'nama.*' => 'required|max:100|string',
            'jenis_kelamin.*' => 'required|string',
            'tempat_lahir.*' => 'required|string',
            'tanggal_lahir.*' => 'required|date',
            'alamat.*' => 'required|max:255|string',
            'ibu_kandung.*' => 'required|string',
            'status_warga.*' => 'required|string',
            'status_keluarga.*' => 'required|string',
            'telepon.*' => 'nullable|string',
            'keluarga_id.*' => 'nullable|string',
            'rt_id.*' => 'required|integer'
        ];

        try {
            $request->validate($rules);
            $data = $request->all();
            if ($request->hasFile('dokumen')) {
                $nik = $request->input('nik');
                $extension = $request->file('dokumen')->extension();
                $dokumen = $request->file('dokumen')->storeAs('dokumen/ktp', "{$nik}.{$extension}", 'public');
                $url = Storage::url($dokumen);
                $data['dokumen'] = $url;
            }
            $warga = Warga::find($id);
            $warga->update($data);
            Session::flash('success', 'Data Warga Berhasil Diperbarui');
            return redirect('/admin/penduduk/warga/' . $id);
        } catch (QueryException $err) {
            Session::flash('error', 'Terjadi kesalahan saat memperbarui data keluarga: ' . $err->getMessage());
            return redirect('/admin/penduduk/warga/' . $id)->withInput();
        }
    }
}
