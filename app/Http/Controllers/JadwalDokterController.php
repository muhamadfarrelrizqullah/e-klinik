<?php

namespace App\Http\Controllers;

use App\Http\Requests\JadwalEditRequest;
use App\Http\Requests\JadwalTambahRequest;
use App\Models\JadwalDokter;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\SQL\DokterJadwalSQL;
use App\Services\SQL\PasienJadwalSQL;
use Illuminate\Support\Facades\Auth;

class JadwalDokterController extends Controller
{
    public function indexDokter()
    {
        return view('dokter.jadwal');
    }

    public function indexPasien()
    {
        $dokters = User::where('role', 'Dokter')->orderBy('nama', 'asc')->get();
        return view('pasien.jadwal', compact('dokters'));
    }

    protected $DataJadwalDokter;
    protected $DataJadwalPasien;

    public function __construct(DokterJadwalSQL $DokterJadwalSQL, PasienJadwalSQL $PasienJadwalSQL)
    {
        $this->DataJadwalDokter = $DokterJadwalSQL;
        $this->DataJadwalPasien = $PasienJadwalSQL;
    }

    public function readDokter()
    {
        $data = $this->DataJadwalDokter->getJadwalData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function readPasien(Request $request)
    {
        $id_dokter = $request->input('id_dokter');
        $data_hari = $request->input('data_hari');

        $data = $this->DataJadwalPasien->getJadwalData($id_dokter, $data_hari);

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function store(JadwalTambahRequest $request)
    {
        $userId = Auth::id();

        $jadwal = new JadwalDokter();   
        $jadwal->id_dokter = $userId;
        $jadwal->hari = $request->hari;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_selesai = $request->jam_selesai;
        $jadwal->save();

        return redirect()->back()->with('success', 'Jadwal berhasil ditambah.');
    }

    public function destroy($id)
    {
        $jadwal = JadwalDokter::find($id);
        if (!$jadwal) {
            return response()->json(['message' => 'Jadwal tidak ada.'], 404);
        }
        $jadwal->delete();
        return response()->json(['message' => 'Jadwal berhasil dihapus.']);
    }

    public function update(JadwalEditRequest $request)
    {
        try {
            $jadwal = JadwalDokter::findOrFail($request->id);
            $jadwal->hari = $request->hari;
            $jadwal->jam_mulai = $request->jam_mulai;
            $jadwal->jam_selesai = $request->jam_selesai;
            $jadwal->save();
            return response()->json(['success' => 'Jadwal berhasil diupdate.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
