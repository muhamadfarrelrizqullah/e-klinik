<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Services\SQL\AdminUserSQL;

class UserController extends Controller
{
    protected $DataUser;

    public function __construct(AdminUserSQL $AdminUserSQL)
    {
        $this->DataUser = $AdminUserSQL;
    }

    public function index()
    {
        return view('admin.user');
    }

    public function readPasien()
    {
        $data = $this->DataUser->getPasienData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function readDokter()
    {
        $data = $this->DataUser->getDokterData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function readAdmin()
    {
        $data = $this->DataUser->getAdminData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }
}
