<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\SQL\AdminRekamMedisSQL;

class RekamMedisController extends Controller
{
    public function indexAdmin()
    {
        $pasiens = User::where('role', 'Pasien')->orderBy('nama', 'asc')->get();
        $dokters = User::where('role', 'Dokter')->orderBy('nama', 'asc')->get();
        return view('admin.rekam-medis', compact('pasiens', 'dokters'));
    }

    protected $DataRekamMedis;

    public function __construct(AdminRekamMedisSQL $AdminRekamMedisSQL)
    {
        $this->DataRekamMedis = $AdminRekamMedisSQL;
    }

    public function read(Request $request)
    {
        $id_dokter = $request->input('id_dokter');
        $id_pasien = $request->input('id_pasien');
        $data_tanggal = $request->input('data_tanggal');
        $tanggal_setelah = $request->input('tanggal_setelah');
        $tanggal_sebelum = $request->input('tanggal_sebelum');

        $data = $this->DataRekamMedis->getRekamMedisData($id_dokter, $id_pasien, $data_tanggal, $tanggal_setelah, $tanggal_sebelum);

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }
}
