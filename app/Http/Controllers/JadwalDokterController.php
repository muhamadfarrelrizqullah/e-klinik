<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SQL\DokterJadwalSQL;

class JadwalDokterController extends Controller
{
    public function indexDokter()
    {
        return view('dokter.jadwal');
    }

    protected $DataJadwal;

    public function __construct(DokterJadwalSQL $DokterJadwalSQL)
    {
        $this->DataJadwal = $DokterJadwalSQL;
    }

    public function read()
    {
        $data = $this->DataJadwal->getJadwalData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }
}
