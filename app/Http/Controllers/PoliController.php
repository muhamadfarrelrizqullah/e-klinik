<?php

namespace App\Http\Controllers;

use App\Http\Requests\PoliEditRequest;
use App\Http\Requests\PoliTambahRequest;
use App\Models\Poli;
use Illuminate\Http\Request;
use App\Services\SQL\AdminPoliSQL;

class PoliController extends Controller
{
    protected $DataPoli;
    public function __construct(AdminPoliSQL $AdminPoliSQL)
    {
        $this->DataPoli = $AdminPoliSQL;
    }
    public function index()
    {
        return view('admin.poli');
    }

    public function read(){
        $data = $this->DataPoli->getPoliData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function store(PoliTambahRequest $request)
    {
        $poli = new Poli();
        $poli->nama = $request->nama;
        $poli->save();

        return redirect()->back()->with('success', 'Poli berhasil ditambah.');
    }

    public function destroy($id)
    {
        $poli = Poli::find($id);
        if (!$poli) {
            return response()->json(['message' => 'Poli tidak ada.'], 404);
        }
        $poli->delete();
        return response()->json(['message' => 'Poli berhasil dihapus.']);
    }

    public function update(PoliEditRequest $request)
    {
        try {
            $poli = Poli::findOrFail($request->id);
            $poli->nama = $request->nama;
            $poli->save();
            return response()->json(['success' => 'Poli berhasil diupdate.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
