<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SQL\AdminPoliSQL;

class PoliController extends Controller
{
    protected $DataPoli;
    public function __construct(AdminPoliSQL $AdminPoliSQL)
    {
        $this->DataPoli = $AdminPoliSQL;
    }
    public function index()
    {
        return view('admin.poli');
    }

    public function read(){
        $data = $this->DataPoli->getPoliData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }
}
