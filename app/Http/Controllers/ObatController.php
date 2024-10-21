<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function indexAdmin()
    {
        return view('admin.obat');
    }
}
