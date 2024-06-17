<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\Level;
use App\Models\Pengajuan;
use App\Models\User;
use App\Services\PendudukService;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $rules = [
        'username' => 'required|string|max:100',
        'password' => 'required|string|max:100',
        'level_id' => 'required|integer',
        'keluarga_id' => 'required|string'
    ];
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
    private UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $url = $this->url();
        $page = "Akun";
        $activeMenu = "akun";

        return view('admin.akun.index', ['url' => $url, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function profil()
    {
        $url = $this->url();
        $page = "Profil";
        $user = Auth::user();
        $data = User::join('keluarga', 'user.keluarga_id', '=', 'keluarga.id')
            ->join('warga', 'keluarga.id', '=', 'warga.keluarga_id')
            ->join('rukun_tetangga', 'warga.rt_id', '=', 'rukun_tetangga.id')
            ->where('user.keluarga_id', $user->keluarga_id)
            ->select('keluarga.nkk', 'warga.nik', 'warga.nama', 'keluarga.dokumen as kk', 'warga.dokumen as ktp', 'warga.jenis_kelamin', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.alamat', 'warga.ibu_kandung', 'warga.status_keluarga', 'warga.telepon', 'nomor', 'pendapatan', 'luas_bangunan', 'jumlah_tanggungan', 'pajak_bumi', 'tagihan_listrik', 'keluarga.id')
            ->get();
        if ($url != 'admin') {
            $pengajuan = Pengajuan::where('nkk', $user->keluarga->nkk)
                ->where('status', '=', 'Menunggu Konfirmasi')
                ->get();
            return view('profil', ['url' => $url, 'page' => $page, 'data' => $data, 'user' => $user, 'pengajuan' => $pengajuan]);
        }
        return view('profil', ['url' => $url, 'page' => $page, 'data' => $data, 'user' => $user]);
    }

    public function create()
    {
        $url = $this->url();
        $page = "Akun";
        $activeMenu = "akun";

        $keluarga = Keluarga::join('warga', 'keluarga.id', '=', 'warga.keluarga_id')
            ->where('warga.status_keluarga', 'Kepala Keluarga')
            ->select('keluarga.id', 'keluarga.nkk', 'warga.nama')
            ->get();
        $level = Level::all();

        return view('admin.akun.create', ['url' => $url, 'page' => $page, 'activeMenu' => $activeMenu, 'keluarga' => $keluarga, 'level' => $level]);
    }

    public function store(Request $request)
    {
        $request->validate($this->rules);
        try {
            if ($this->userService->checkUsernameExist($request->username)) {
                Session::flash('error', 'Username sudah digunakan');
                return redirect('/admin/akun/create')->withInput();
            }
            if ($this->userService->checkAccountFamily($request->keluarga_id)) {
                Session::flash('error', 'Keluarga sudah mempunyai akun');
                return redirect('/admin/akun/create')->withInput();
            }
            if ($request->level_id == 2) {
                if ($this->userService->checkLevelRW($request->level_id)) {
                    Session::flash('error', 'Sudah mempunyai ketua RW');
                    return redirect('/admin/akun/create')->withInput();
                }
            }
            if ($request->level_id == 3) {
                $data = User::join('keluarga', 'user.keluarga_id', '=', 'keluarga.id')
                    ->join('warga', 'keluarga.id', '=', 'warga.keluarga_id')
                    ->where('keluarga.id', $request->keluarga_id)
                    ->select('warga.rt_id')
                    ->distinct()
                    ->value('warga.rt_id');
                if ($this->userService->checkLevelRT($request->level_id, $data)) {
                    Session::flash('error', 'RT 0' . $data . ' sudah mempunyai ketua RT');
                    return redirect('/admin/akun/create')->withInput();
                }
            }
            DB::transaction(function () use ($request) {
                User::create([
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                    'level_id' => $request->level_id,
                    'keluarga_id' => $request->keluarga_id
                ]);
            });
            Session::flash('success', 'Akun berhasil disimpan');
            return redirect('/admin/akun');
        } catch (QueryException $err) {
            Session::flash('errors', 'Terjadi kesalahan saat menyimpan akun: ' . $err->getMessage());
            return redirect('/admin/akun/create')->withInput();
        }
    }

    public function detail($id) {
        $page = "Akun";
        $activeMenu = "akun";
        $url = $this->url();

        $user = User::find($id);
        $keluarga = Keluarga::join('warga', 'keluarga.id', '=', 'warga.keluarga_id')
            ->where('warga.status_keluarga', 'Kepala Keluarga')
            ->select('keluarga.id', 'keluarga.nkk', 'warga.nama')
            ->get();
        $level = Level::all();

        return view('admin.akun.detail', ['url' => $url, 'page' => $page, 'activeMenu' => $activeMenu, 'data' => $user, 'keluarga' => $keluarga, 'level' => $level]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate($this->rules);

        try {
            $user->update([
                'username' => $request->username,
                'level_id' => $request->level_id,
                'keluarga_id' => $request->keluarga_id
            ]);

            if (!Hash::check($request->password, $user->password)) {
                $request['password'] = bcrypt($request->password);
                $user->update($request->all());
            }
            return redirect('/admin/akun/' . $id)->with('success', 'Akun berhasil diubah');
        } catch (QueryException $err) {
            Session::flash('errors', 'Terjadi kesalahan saat menyimpan akun: ' . $err->getMessage());
            return redirect('/admin/akun/' . $id)->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            Session::flash('success', 'Akun berhasil dihapus');
            return redirect('/admin/akun');
        } catch (QueryException $e) {
            Session::flash('error', 'Akun gagal dihapus' . $e->getMessage());
            return redirect('/admin/akun');
        }
    }

    public function changeProfile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'username' => 'required|string|max:100',
            'old_pass' => 'required|string|max:100',
            'new_pass' => 'required|string|max:100',
        ]);

        if (!Hash::check($request->old_pass, $user->password)) {
            Session::flash('error', 'Password lama tidak sesuai');
            return redirect()->back();
        }

        $data = User::find($user->id);
        $data->update([
            'username' => $request->username,
            'password' => bcrypt($request->new_pass)
        ]);

        Session::flash('success', 'Password berhasil diubah');
        return redirect()->back();
    }

    public function profilUpdate(Request $request)
    {
        $url = $this->url();
        $request->validate([
            'pendapatan' => 'numeric|nullable',
            'luas_bangunan' => 'numeric|nullable',
            'jumlah_tanggungan' => 'numeric|nullable',
            'pajak_bumi' => 'numeric|nullable',
            'tagihan_listrik' => 'numeric|nullable'
        ]);
        try {
            $user = Auth::user();
            $data = Keluarga::find($user->keluarga_id);
            $data->update($request->all());
            Session::flash('success', 'Data berhasil diubah');
            return redirect($url . '/profil');
        } catch (QueryException $err) {
            Session::flash('error', 'Terjadi kesalahan saat menyimpan akun: ' . $err->getMessage());
            return redirect($url . '/profil')->withInput();
        }
    }
}
