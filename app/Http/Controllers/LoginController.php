<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
     public function index()
    {
        $page = "Login";
        $activeMenu = "login";

        return view('login', ['page' => $page, 'activeMenu' => $activeMenu]);
    }
}
