<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SQL\AdminDivisiSQL;

class DivisiController extends Controller
{
    protected $DataDivisi;
    public function __construct(AdminDivisiSQL $AdminDivisiSQL)
    {
        $this->DataDivisi = $AdminDivisiSQL;
    }
    public function index()
    {
        return view('admin.divisi');
    }
    public function read(){
        $data = $this->DataDivisi->getDivisiData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }
}
