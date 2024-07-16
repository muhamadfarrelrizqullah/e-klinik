<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengajuanEditRequest;
use App\Models\Pengajuan;
use App\Models\User;
use App\Services\SQL\AdminPengajuanSQL;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    protected $DataPengajuan;
    public function __construct(AdminPengajuanSQL $AdminPengajuanSQL)
    {
        $this->DataPengajuan = $AdminPengajuanSQL;
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
        return view('pasien.pengajuan');
    }
}
