<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SQL\AdminRekamMedisSQL;

class RekamMedisController extends Controller
{
    public function indexAdmin()
    {
        return view('admin.rekam-medis');
    }

    protected $DataRekamMedis;

    public function __construct(AdminRekamMedisSQL $AdminRekamMedisSQL)
    {
        $this->DataRekamMedis = $AdminRekamMedisSQL;
    }

    public function read()
    {
        $data = $this->DataRekamMedis->getRekamMedisData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }
}
