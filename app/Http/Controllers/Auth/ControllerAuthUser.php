<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerAuthUser extends Controller
{
    public function index()
    {
        return view('auth.loginuser');
    }

    public function login(Request $request)
    {
        // nanti isi login admin/guru
    }
}