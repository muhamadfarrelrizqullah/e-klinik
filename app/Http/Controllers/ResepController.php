<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\SQL\DokterResepSQL;
use Illuminate\Support\Facades\Auth;

class ResepController extends Controller
{
    protected $DokterResep;

    public function __construct(DokterResepSQL $DokterResepSQL)
    {
        $this->DokterResep = $DokterResepSQL;
    }

    public function indexDokter()
    {
        $userId = Auth::id();
        $users = User::findOrFail($userId);
        $pasiens = User::where('role', 'Pasien')->orderBy('nama', 'asc')->get();
        return view('dokter.resep', compact('users', 'pasiens'));
    }

    public function readDokter(Request $request)
    {
        $id_pasien = $request->input('id_pasien');
        $data_tanggal = $request->input('data_tanggal');
        $tanggal_setelah = $request->input('tanggal_setelah');
        $tanggal_sebelum = $request->input('tanggal_sebelum');

        $data = $this->DokterResep->getResepData($id_pasien, $data_tanggal, $tanggal_setelah, $tanggal_sebelum);

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }
}
