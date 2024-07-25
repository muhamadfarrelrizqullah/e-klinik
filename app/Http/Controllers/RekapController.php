<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SQL\DokterRekapSQL;

class RekapController extends Controller
{
    public function indexDokter()
    {
        return view('dokter.histori');
    }

    protected $DataRekap;

    public function __construct(DokterRekapSQL $DokterRekapSQL)
    {
        $this->DataRekap = $DokterRekapSQL;
    }

    public function read()
    {
        $data = $this->DataRekap->getRekapData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }
}
