<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeritaEditRequest;
use App\Http\Requests\BeritaTambahRequest;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita', compact('berita'));
    }

    public function indexAdmin()
    {
        return view('admin.berita');
    }

    public function read()
    {
        $data = Berita::all();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function store(BeritaTambahRequest $request)
    {
        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->isi = $request->isi;
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/covers', $fileName);
            $berita->cover = $fileName;
        } else {
            $berita->cover = null;
        }
        $berita->save();

        return redirect()->back()->with('success', 'Berita berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $berita = Berita::find($id);
        if (!$berita) {
            return response()->json(['message' => 'Berita tidak ada.'], 404);
        }
        $berita->delete();
        return response()->json(['message' => 'Berita berhasil dihapus.']);
    }

    public function update(BeritaEditRequest $request)
    {
        try {
            $berita = Berita::findOrFail($request->id);
            $berita->judul = $request->judul;
            $berita->deskripsi = $request->deskripsi;
            $berita->isi = $request->isi;
            $berita->save();
            return response()->json(['success' => 'Berita berhasil diupdate.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
