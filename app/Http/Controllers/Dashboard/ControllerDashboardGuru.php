<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;

class ControllerDashboardGuru extends Controller
{
    public function index()
    {
        // Ambil semua data guru
        $guru = ModelUser::where('role', 'guru')->get();

        // Hitung jumlah guru
        $jumlahGuru = ModelUser::where('role', 'guru')->count();

        return view('user.dashboard.guru', compact(
            'guru',
            'jumlahGuru'
        ));
    }
}