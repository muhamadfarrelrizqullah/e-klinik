<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
    public function indexDokter()
    {
        return view('dokter.pemeriksaan');
    }
}
