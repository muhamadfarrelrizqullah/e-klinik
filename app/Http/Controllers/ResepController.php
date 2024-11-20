<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResepController extends Controller
{
    public function indexDokter()
    {
        return view('dokter.resep');
    }
}
