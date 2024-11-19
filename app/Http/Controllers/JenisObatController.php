<?php

namespace App\Http\Controllers;

use App\Http\Requests\JenisObatEditRequest;
use App\Http\Requests\JenisObatTambahRequest;
use App\Models\JenisObat;
use Illuminate\Http\Request;
use App\Services\SQL\ApotekerJenisObatSQL;

class JenisObatController extends Controller
{
    public function indexApoteker()
    {
        return view('apoteker.jenis-obat');
    }

    protected $DataJenisObat;

    public function __construct(ApotekerJenisObatSQL $DataJenisObat)
    {
        $this->DataJenisObat = $DataJenisObat;
    }

    public function read()
    {
        $data = $this->DataJenisObat->getJenisObatData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function store(JenisObatTambahRequest $request)
    {
        $jenis = new JenisObat();
        $jenis->nama = $request->nama;
        $jenis->save();

        return redirect()->back()->with('success', 'Jenis Obat berhasil ditambah.');
    }

    public function destroy($id)
    {
        $jenis = JenisObat::find($id);
        if (!$jenis) {
            return response()->json(['message' => 'Jenis Obat tidak ada.'], 404);
        }
        $jenis->delete();
        return response()->json(['message' => 'Jenis Obat berhasil dihapus.']);
    }

    public function update(JenisObatEditRequest $request)
    {
        try {
            $jenis = JenisObat::findOrFail($request->id);
            $jenis->nama = $request->nama;
            $jenis->save();
            return response()->json(['success' => 'Jenis Obat berhasil diupdate.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
