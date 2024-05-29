<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
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
        return redirect('/login')->withInput()->withErrors([
            'failed' => 'Username atau password salah'
        ]);
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
