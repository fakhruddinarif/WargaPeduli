<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\RukunTetangga;
use App\Service\PendudukService;
use App\Service\UserService;
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

    public function checkPengajuan(Request $request) {
        $pengajuan = Pengajuan::find($request->id);
        $rt = $pengajuan->rukunTetangga;

        return view('detail', ['data' => $pengajuan, 'rt' => $rt]);
    }
    public function pengajuan()
    {
        $rt = RukunTetangga::all();
        return view('pengajuan', ['rt' => $rt]);
    }
    public function storePengajuan(Request $request)
    {
        try {
            $request->validate([
                'dokumen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'nik' => 'string|nullable|max:20',
                'nkk' => 'string|nullable|max:20',
                'nama' => 'string|required|max:100',
                'jenis_kelamin' => 'string|nullable',
                'tempat_lahir' => 'string|nullable|max:50',
                'tanggal_lahir' => 'date|nullable',
                'alamat' => 'string|nullable|max:255',
                'ibu_kandung' => 'string|nullable|max:100',
                'status_warga' => 'string|required',
                'telepon' => 'string|nullable|max:16',
                'username' => 'string|nullable|unique:user,username',
                'password' => 'string|nullable',
                'rt_id' => 'required|integer'
            ]);
            $data = $request->all();

            if ($request->hasFile('dokumen')) {
                $extension = $request->file('dokumen')->extension();
                if ($request->status_warga == 'Menetap') {
                    if ($this->userService->checkUsernameExist($request->username)) {
                        Session::flash('error', 'Username sudah terdaftar');
                        return redirect('/pengajuan');
                    }
                    if ($this->pendudukService->checkFamilyExist($request->nkk)) {
                        Session::flash('error', 'NKK sudah terdaftar');
                        return redirect('/pengajuan');
                    }
                    $nkk = $request->nkk;
                    $dokumen = $request->file('dokumen')->storeAs('pengajuan', $nkk . '.' . $extension, 'public');
                    $url = Storage::url($dokumen);
                    $data['dokumen'] = $url;
                } else {
                     if ($this->pendudukService->checkResidentExist($request->nik)) {
                          Session::flash('error', 'NIK sudah terdaftar');
                          return redirect('/pengajuan');
                     }
                   $nik = $request->nik;
                   $dokumen = $request->file('dokumen')->storeAs('pengajuan', $nik . '.' . $extension, 'public');
                   $url = Storage::url($dokumen);
                   $data['dokumen'] = $url;
                }
                Pengajuan::create($data);
                Session::flash('success', 'Data berhasil disimpan');
                return redirect('/pengajuan');
            }
        } catch (QueryException $error) {
            Session::flash('error', 'Data gagal disimpan atau data sudah ada');
            Log::error($error->getMessage());
            return redirect('/pengajuan');
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
