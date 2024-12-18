<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita', compact('berita'));
    }
}
