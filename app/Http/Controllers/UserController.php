<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\Level;
use App\Models\User;
use App\Service\PendudukService;
use App\Service\UserService;
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

    public function create()
    {
        $url = $this->url();
        $page = "Akun";
        $activeMenu = "akun";

        $keluarga = Keluarga::all();
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
        $keluarga = Keluarga::all();
        $level = Level::all();

        return view('admin.akun.detail', ['url' => $url, 'page' => $page, 'activeMenu' => $activeMenu, 'data' => $user, 'keluarga' => $keluarga, 'level' => $level]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate($this->rules);

        try {
            if (!Hash::check($request->password, $user->password)) {
                $request['password'] = bcrypt($request->password);
                $user->update($request->all());
            }
            $user->update([
                'username' => $request->username,
                'level_id' => $request->level_id,
                'keluarga_id' => $request->keluarga_id
            ]);
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
}
