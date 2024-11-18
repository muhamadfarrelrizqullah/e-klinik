<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Obat;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ObatTambahRequest;
use App\Http\Requests\ObatEditRequest;
use App\Services\SQL\ApotekerObatSQL;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function indexApoteker()
    {
        return view('apoteker.obat');
    }

    public function indexAdmin()
    {
        return view('admin.obat');
    }

    protected $DataObat;

    public function __construct(ApotekerObatSQL $DataObat)
    {
        $this->DataObat = $DataObat;
    }

    public function read()
    {
        $data = $this->DataObat->getObatData();

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
            $obat->nama = $request->nama;
            $obat->qty = $request->qty;
            $obat->satuan = $request->satuan;
            $obat->jenis_obat = $request->jenis_obat;
            $obat->save();
            return response()->json(['success' => 'Obat berhasil diupdate.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
