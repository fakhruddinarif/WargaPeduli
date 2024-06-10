<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\RukunTetangga;
use App\Services\ChartService;
use App\Services\PendudukService;
use App\Services\UserService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    private PendudukService $pendudukService;
    private UserService $userService;

    public function __construct(PendudukService $pendudukService, UserService $userService)
    {
        $this->pendudukService = $pendudukService;
        $this->userService = $userService;
    }

    public function landingPage()
    {
        $rt = RukunTetangga::all();
        return view('welcome', ['rt' => $rt]);
    }

    public function checkPengajuan(Request $request) {
        $pengajuan = Pengajuan::find($request->id);
        Session::flash('pengajuan', $pengajuan);
        return redirect('/');
    }
    public function storePengajuan(Request $request)
    {
        $request->validate([
            'status_warga' => 'required|string',
            'dokumen_kk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nkk' => 'nullable|string',
            'dokumen_ktp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nik' => 'required|string',
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'rt_id' => 'required|integer',
            'ibu_kandung' => 'required|string',
            'telepon' => 'nullable|string',
        ]);
        if ($request->status_warga == 'Menetap') {
            $request->validate([
                'dokumen_kk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'nkk' => 'required |string',
            ]);
        }

        try {
            $data = $request->all();
            if ($request->status_warga == 'Menetap') {
                if ($request->hasFile('dokumen_kk')) {
                    $nkk = $request->input('nkk');
                    $extension = $request->file('dokumen_kk')->extension();
                    $dokumenKK = $request->file('dokumen_kk')->storeAs('pengajuan/kk', "{$nkk}.{$extension}", 'public');
                    $urlKK = Storage::url($dokumenKK);
                    $data['dokumen_kk'] = $urlKK;
                }
            }
            if ($request->hasFile('dokumen_ktp')) {
                $nik = $request->input('nik');
                $extension = $request->file('dokumen_ktp')->extension();
                $dokumenKTP = $request->file('dokumen_ktp')->storeAs('pengajuan/ktp', "{$nik}.{$extension}", 'public');
                $urlKTP = Storage::url($dokumenKTP);
                $data['dokumen_ktp'] = $urlKTP;
            }
            $data['status'] = 'Menunggu Konfirmasi';
            $data['status_pengajuan'] = $request->status_warga == 'Menetap' ? 'Keluarga' : 'Warga';
            $data['status_keluarga'] = $request->status_warga == 'Menetap' ? 'Kepala Keluarga' : 'Lainnya';

            Pengajuan::create($data);

            $result = Pengajuan::latest()->first();
            Session::flash('success', $result->id);
            return redirect('/');
        } catch (QueryException $error) {
            Session::flash('error', 'Data gagal disimpan atau data sudah ada');
            Log::error($error->getMessage());
            return redirect('/');
        }
    }
    public function index()
    {
        $user = Auth::user();
        if ($user) {
            if ($user->level_id == '1') {
                return redirect('/admin');
            }
            else if ($user->level_id == '2') {
                return redirect('/rw');
            }
            else if ($user->level_id == '3') {
                return redirect('/rt');
            }
            else if ($user->level_id == '4') {
                return redirect('/warga');
            }

        }
        return view('login');
    }
    public function storelogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($request->only('username', 'password'))) {
            $user = Auth::user();

            Auth::login($user);

            if ($user->level->nama == 'Admin') {
                return redirect('/admin');
            }
            else if ($user->level_id == 'Ketua RW') {
                return redirect('/rw');
            }
            else if ($user->level_id == 'Ketua RT') {
                return redirect('/rt');
            }
            else if ($user->level_id == 'Warga') {
                return redirect('/warga');
            }
        }
        Session::flash('error', 'Username atau Password salah');
        return redirect('/login');
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
