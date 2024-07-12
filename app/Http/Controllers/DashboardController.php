<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\User;
use App\Services\SQL\AdminPengajuanSQL;


class DashboardController extends Controller
{
    public function indexAdmin()
    {
        return view('admin.dashboard');
    }

    public function indexDokter()
    {
        $pengajuan = Pengajuan::all();
        return view('dokter.dashboard', compact('pengajuan'));
    }

    public function indexPasien()
    {
        $pengajuan = Pengajuan::where('id_pasien', auth()->user()->id)->get();
        // dd($pengajuan);
        $user = auth()->user();
        return view('pasien.dashboard', compact('pengajuan', 'user'));
    }

    public function dasboardPasien(Request $request)
{
    $userId = auth()->user()->id; // Get the currently logged-in user's ID

    $pengajuan = Pengajuan::where('id_pasien', $userId)
    ->join('users', 'users.id', '=', 'pengajuans.id_pasien')
    ->select('pengajuans.*', 'users.nama as nama_pasien')
    ->get(); // Filter submissions by user ID
    // dd($pengajuan);

    return datatables()->of($pengajuan)
        ->addIndexColumn()
        ->make(true);
}
}
