<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrController extends Controller
{
    public function indexDokter()
    {
        return view('dokter.scan-qr');
    }
}
