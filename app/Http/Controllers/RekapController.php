<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function indexDokter()
    {
        return view('dokter.histori');
    }
}
