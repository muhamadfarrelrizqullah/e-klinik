<?php

namespace App\Http\Controllers;

use App\Models\JenisObat;
use App\Models\Obat;
use Illuminate\Http\Request;
use App\Services\SQL\ApotekerObatKeluarSQL;

class ObatKeluarController extends Controller
{
    protected $ApotekerObatKeluar;

    public function __construct(ApotekerObatKeluarSQL $ApotekerObatKeluarSQL)
    {
        $this->ApotekerObatKeluar = $ApotekerObatKeluarSQL;
    }

    public function indexApoteker()
    {
        $obats = Obat::all();
        $jenis_obats = JenisObat::all();
        return view('apoteker.obat-keluar', compact('obats', 'jenis_obats'));
    }

    public function readApoteker(Request $request)
    {
        $data_nama = $request->input('data_nama');
        $data_jenis = $request->input('data_jenis');
        $data_tanggal = $request->input('data_tanggal');

        $data = $this->ApotekerObatKeluar->getObatKeluarData($data_nama, $data_jenis, $data_tanggal);

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }
}
