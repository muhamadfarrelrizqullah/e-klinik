<?php

namespace App\Http\Controllers;

use App\Http\Requests\DivisiEditRequest;
use App\Http\Requests\DivisiTambaRequest;
use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Services\SQL\AdminDivisiSQL;

class DivisiController extends Controller
{
    protected $DataDivisi;
    public function __construct(AdminDivisiSQL $AdminDivisiSQL)
    {
        $this->DataDivisi = $AdminDivisiSQL;
    }
    public function index()
    {
        return view('admin.divisi');
    }
    public function read()
    {
        $data = $this->DataDivisi->getDivisiData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function store(DivisiTambaRequest $request)
    {
        $divisi = new Divisi();
        $divisi->nama = $request->nama;
        $divisi->save();

        return redirect()->back()->with('success', 'Divisi berhasil ditambah.');
    }

    public function destroy($id)
    {
        $divisi = Divisi::find($id);
        if (!$divisi) {
            return response()->json(['message' => 'Divisi tidak ada.'], 404);
        }
        $divisi->delete();
        return response()->json(['message' => 'Divisi berhasil dihapus.']);
    }

    public function update(DivisiEditRequest $request)
    {
        try {
            $divisi = Divisi::findOrFail($request->id);
            $divisi->nama = $request->nama;
            $divisi->save();
            return response()->json(['success' => 'Divisi berhasil diupdate.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
