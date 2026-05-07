<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class ControllerDashboardGuru extends Controller
{
    public function index()
    {
        return view('user.dashboard.guru');
    }
}