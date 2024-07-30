<?php

namespace App\Http\Controllers;

use App\Http\Requests\PemeriksaanUpdateStatusRequest;
use App\Models\Pengajuan;
use App\Models\Rekap;
use App\Models\User;
use App\Services\SQL\DokterPemeriksaanSQL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemeriksaanController extends Controller
{
    protected $DokterPemeriksaan;

    public function __construct(DokterPemeriksaanSQL $DokterPemeriksaanSQL)
    {
        $this->DokterPemeriksaan = $DokterPemeriksaanSQL;
    }

    public function indexDokter()
    {
        $userId = Auth::id();
        $users = User::findOrFail($userId);
        return view('dokter.pemeriksaan', compact('users'));
    }

    public function readPemeriksaan()
    {
        $data = $this->DokterPemeriksaan->getPemeriksaanData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function storePemeriksaan(PemeriksaanUpdateStatusRequest $request)
    {
        $dokterId = Auth::id();
        $pengajuanId = $request->id_pengajuan;
        $pengajuan = Pengajuan::find($pengajuanId);
        $pengajuan->status = "Selesai";
        $pengajuan->catatan = $request->catatan ?? "Tidak ada catatan";
        $pengajuan->id_dokter = $dokterId;
        $pengajuan->save();

        if ($request->hasFile('surat_perizinan_file')) {
            $file = $request->file('surat_perizinan_file');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/pdf', $fileName);
        } else {
            $fileName = null;
        }

        $noRekap = 'RKP' . now()->format('dmY') . $pengajuanId;
        $rekap = new Rekap();
        $rekap->no_rekap = $noRekap;
        $rekap->id_pasien = $request->id_pasien;
        $rekap->id_dokter = $request->id_dokter;
        $rekap->id_pengajuan = $request->id_pengajuan;
        $rekap->qrcode = $request->qrcode;
        $rekap->surat_izin = $fileName;
        $rekap->save();

        return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui.');
    }
}