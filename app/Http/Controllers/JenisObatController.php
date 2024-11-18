<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenisObatController extends Controller
{
    public function indexApoteker()
    {
        return view('apoteker.jenis-obat');
    }
}
