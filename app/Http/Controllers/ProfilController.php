<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('admin.profil');
    }

    public function indexPasien()
    {
        return view('pasien.profil');
    }
}
