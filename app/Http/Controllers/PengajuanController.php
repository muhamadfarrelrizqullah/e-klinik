<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengajuanEditRequest;
use App\Http\Requests\PengajuanTambahRequest;
use App\Models\Pengajuan;
use App\Models\Poli;
use App\Models\User;
use App\Services\SQL\AdminPengajuanSQL;
use App\Services\SQL\PasienPengajuanSQL;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    protected $DataPengajuan;
    protected $PasienPengajuan;
    public function __construct(AdminPengajuanSQL $AdminPengajuanSQL, PasienPengajuanSQL $PasienPengajuanSQL)
    {
        $this->DataPengajuan = $AdminPengajuanSQL;
        $this->PasienPengajuan = $PasienPengajuanSQL;
    }

    public function index()
    {
        $dokters = User::where('role', 'Dokter')->get();
        $pasiens = User::where('role', 'Pasien')->get();
        return view('admin.pengajuan', compact('dokters', 'pasiens'));
    }

    public function read()
    {
        $data = $this->DataPengajuan->getPengajuanData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function destroy($id)
    {
        $pengajuan = Pengajuan::find($id);
        if (!$pengajuan) {
            return response()->json(['message' => 'Pengajuan tidak ada.'], 404);
        }
        $pengajuan->delete();
        return response()->json(['message' => 'Pengajuan berhasil dihapus.']);
    }

    public function update(PengajuanEditRequest $request)
    {
        try {
            $pengajuan = Pengajuan::findOrFail($request->id);
            $pengajuan->id_pasien = $request->pasien;
            $pengajuan->id_dokter = $request->dokter;
            $pengajuan->keluhan = $request->keluhan;
            $pengajuan->status = $request->status;
            $pengajuan->tanggal_pengajuan = $request->tanggal_pengajuan;
            $pengajuan->tanggal_pemeriksaan = $request->tanggal_pemeriksaan;
            $pengajuan->catatan = $request->catatan ?? "Tidak ada catatan";
            $pengajuan->save();
            return response()->json(['success' => 'Pengajuan berhasil diupdate.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function indexPasien()
    {
        $polis = Poli::all();
        $userId = Auth::id();
        $users = User::findOrFail($userId);
        return view('pasien.pengajuan', compact('polis', 'users'));
    }

    public function readPasien()
    {
        $data = $this->PasienPengajuan->getPengajuanData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function store(PengajuanTambahRequest $request)
    {
        $pasienId = Auth::id();
        $statusAwal = "Pending"; 
        $statusQr = "null";
        $catatan = "Tidak ada catatan";

        $pengajuan = new Pengajuan();
        $pengajuan->id_pasien = $pasienId;
        $pengajuan->keluhan = $request->keluhan;
        $pengajuan->id_poli = $request->poli;
        $pengajuan->status = $statusAwal;
        $pengajuan->tanggal_pengajuan = Carbon::now();
        $pengajuan->tanggal_pemeriksaan = $request->tanggal_pemeriksaan;
        $pengajuan->status_qrcode = $statusQr;
        $pengajuan->catatan = $catatan;
        $pengajuan->save();

        $user = User::find($pasienId);
        $user->tinggi_badan = $request->tinggi_badan ?? 0;
        $user->berat_badan = $request->berat_badan ?? 0;
        $user->save();

        return redirect()->back()->with('success', 'Pengajuan berhasil ditambah.');
    }
}
