<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResepTambahRequest;
use App\Models\DetailResep;
use App\Models\Obat;
use App\Models\Resep;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\SQL\DokterResepSQL;
use Illuminate\Support\Facades\Auth;

class ResepController extends Controller
{
    protected $DokterResep;

    public function __construct(DokterResepSQL $DokterResepSQL)
    {
        $this->DokterResep = $DokterResepSQL;
    }

    public function indexDokter()
    {
        $userId = Auth::id();
        $users = User::findOrFail($userId);
        $obats = Obat::all();
        $pasiens = User::where('role', 'Pasien')->orderBy('nama', 'asc')->get();
        return view('dokter.resep', compact('users', 'pasiens', 'obats'));
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
}
