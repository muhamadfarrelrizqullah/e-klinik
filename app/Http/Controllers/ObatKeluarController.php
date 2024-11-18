<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObatKeluarController extends Controller
{
    public function indexApoteker()
    {
        return view('apoteker.obat-keluar');
    }
}
