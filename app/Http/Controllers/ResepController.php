<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResepTambahRequest;
use App\Models\DetailResep;
use App\Models\Obat;
use App\Models\Resep;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\SQL\DokterResepSQL;
use App\Services\SQL\ApotekerResepSQL;
use Illuminate\Support\Facades\Auth;

class ResepController extends Controller
{
    protected $DokterResep;
    protected $ApotekerResep;

    public function __construct(DokterResepSQL $DokterResepSQL, ApotekerResepSQL $ApotekerResepSQL)
    {
        $this->DokterResep = $DokterResepSQL;
        $this->ApotekerResep = $ApotekerResepSQL;
    }

    public function indexDokter()
    {
        $userId = Auth::id();
        $users = User::findOrFail($userId);
        $obats = Obat::all();
        $pasiens = User::where('role', 'Pasien')->orderBy('nama', 'asc')->get();
        return view('dokter.resep', compact('users', 'pasiens', 'obats'));
    }

    public function indexApoteker()
    {
        $userId = Auth::id();
        $users = User::findOrFail($userId);
        $obats = Obat::all();
        $pasiens = User::where('role', 'Pasien')->orderBy('nama', 'asc')->get();
        $dokters = User::where('role', 'Dokter')->orderBy('nama', 'asc')->get();
        return view('apoteker.resep', compact('users', 'pasiens', 'obats', 'dokters'));
    }

    public function readDokter(Request $request)
    {
        $id_pasien = $request->input('id_pasien');
        $data_tanggal = $request->input('data_tanggal');
        $tanggal_setelah = $request->input('tanggal_setelah');
        $tanggal_sebelum = $request->input('tanggal_sebelum');

        $data = $this->DokterResep->getResepData($id_pasien, $data_tanggal, $tanggal_setelah, $tanggal_sebelum);

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function readApoteker(Request $request)
    {
        $id_pasien = $request->input('id_pasien');
        $id_dokter = $request->input('id_dokter');
        $tanggal_dibuat = $request->input('tanggal_dibuat');

        $data = $this->ApotekerResep->getResepData($id_pasien, $id_dokter, $tanggal_dibuat);

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function storeResep(ResepTambahRequest $request)
    {
        $pengajuanId = $request->id_pengajuan;
        $noResep = 'RSP' . now()->format('dmY') . $pengajuanId;
        $resep = new Resep();
        $resep->id_pengajuan = $pengajuanId;
        $resep->kode_resep = $noResep;
        $resep->status = 'Diproses';
        $resep->save();

        foreach ($request->obat as $detail) {
            $detailResep = new DetailResep();
            $detailResep->id_resep = $resep->id;
            $detailResep->id_obat = $detail['id_obat'];
            $detailResep->jumlah = $detail['jumlah'];
            $detailResep->save();
        }

        return redirect()->back()->with('success', 'Resep berhasil ditambah.');
    }

    public function updateStatus(Request $request)
    {
        try {
            $resep = Resep::findOrFail($request->id);

            if ($request->status === 'Selesai') {
                $details = DetailResep::where('id_resep', $resep->id)->get();
                foreach ($details as $detail) {
                    $obat = Obat::findOrFail($detail->id_obat);

                    // Periksa apakah stok cukup
                    if ($obat->qty < $detail->jumlah) {
                        return response()->json([
                            'message' => "Stok obat {$obat->nama} tidak mencukupi."
                        ], 400);
                    }

                    $obat->qty -= $detail->jumlah;
                    $obat->save();
                }
            }

            $resep->status = $request->status;
            $resep->save();

            return response()->json(['success' => 'Status resep berhasil diperbarui.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
