<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexAdmin()
    {
        return view('admin.dashboard');
    }

    public function indexDokter()
    {
        return view('dokter.dashboard');
    }

    public function indexPasien()
    {
        return view('pasien.dashboard');
    }
}
