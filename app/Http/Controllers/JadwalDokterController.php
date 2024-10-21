<?php

namespace App\Http\Controllers;

use App\Http\Requests\JadwalEditAdminRequest;
use App\Http\Requests\JadwalEditRequest;
use App\Http\Requests\JadwalTambahAdminRequest;
use App\Http\Requests\JadwalTambahRequest;
use App\Models\JadwalDokter;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\SQL\DokterJadwalSQL;
use App\Services\SQL\AdminJadwalSQL;
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

    public function indexAdmin()
    {
        $dokters = User::where('role', 'Dokter')->orderBy('nama', 'asc')->get();
        return view('admin.jadwal', compact('dokters'));
    }

    protected $DataJadwalDokter;
    protected $DataJadwalPasien;
    protected $DataJadwalAdmin;

    public function __construct(DokterJadwalSQL $DokterJadwalSQL, PasienJadwalSQL $PasienJadwalSQL, AdminJadwalSQL $AdminJadwalSQL)
    {
        $this->DataJadwalDokter = $DokterJadwalSQL;
        $this->DataJadwalPasien = $PasienJadwalSQL;
        $this->DataJadwalAdmin = $AdminJadwalSQL;
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

    public function readAdmin(Request $request)
    {
        $id_dokter = $request->input('id_dokter');
        $data_hari = $request->input('data_hari');

        $data = $this->DataJadwalAdmin->getJadwalData($id_dokter, $data_hari);

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

    public function storeAdmin(JadwalTambahAdminRequest $request)
    {
        $jadwal = new JadwalDokter();   
        $jadwal->id_dokter = $request->id_dokter;
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

    public function updateAdmin(JadwalEditAdminRequest $request)
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
