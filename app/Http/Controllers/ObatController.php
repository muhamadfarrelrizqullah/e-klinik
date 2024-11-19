<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Obat;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ObatTambahRequest;
use App\Http\Requests\ObatEditRequest;
use App\Services\SQL\ApotekerObatSQL;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    protected $DataObat;

    public function __construct(ApotekerObatSQL $DataObat)
    {
        $this->DataObat = $DataObat;
    }

    public function indexApoteker()
    {
        $obats = Obat::select('jenis_obat', 'nama')
            ->distinct('jenis_obat')
            ->orderBy('jenis_obat', 'asc')
            ->get();
        return view('apoteker.obat', compact('obats'));
    }

    public function indexAdmin()
    {
        return view('admin.obat');
    }

    public function read(Request $request)
    {
        $nama_obat = $request->input('nama');
        $data_jenis_obat = $request->input('jenis_obat');

        $data = $this->DataObat->getObatData($nama_obat, $data_jenis_obat);

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }
    public function store(ObatTambahRequest $request)
    {
        $obat = new Obat();
        $obat->nama = $request->nama;
        $obat->qty = $request->qty;
        $obat->satuan = $request->satuan;
        $obat->jenis_obat = $request->jenis_obat;
        $obat->save();

        return redirect()->back()->with('success', 'Obat berhasil ditambah.');
    }
    public function destroy($id)
    {
        $obat = Obat::find($id);
        if (!$obat) {
            return response()->json(['message' => 'Obat tidak ada.'], 404);
        }
        $obat->delete();
        return response()->json(['message' => 'Obat berhasil dihapus.']);
    }
    public function update(ObatEditRequest $request)
    {
        try {
            $obat = Obat::findOrFail($request->id);
            if (!$obat) {
                return response()->json(['message' => 'Obat tidak ditemukan.'], 404);
            }

            $obat->nama = $request->nama;
            $obat->qty = $request->qty;
            $obat->satuan = $request->satuan;
            $obat->jenis_obat = $request->jenis_obat;
            $obat->save();

            return response()->json(['success' => 'Obat berhasil diupdate.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}
