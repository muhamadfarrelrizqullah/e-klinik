<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function indexAdmin()
    {
        return view('admin.rekam-medis');
    }
}
