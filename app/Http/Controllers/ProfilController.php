<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilEditRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfilController extends Controller
{
    public function index()
    {
        return view('admin.profil');
    }

    public function edit()
    { 
        $userId = Auth::id();
        $users = User::findOrFail($userId);
        return view('admin.profil-edit', compact('users'));
    }

    public function indexPasien()
    {
        return view('pasien.profil');
    }

    public function editPasien()
    { 
        $userId = Auth::id();
        $users = User::findOrFail($userId);
        return view('pasien.profil-edit', compact('users'));
    }

    public function update(ProfilEditRequest $request)
    {
        try {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $user->nama = $request->input('nama');
            $user->tanggal_lahir = $request->input('tanggal_lahir');
            $user->tinggi_badan = $request->input('tinggi_badan') ?? 0;
            $user->berat_badan = $request->input('berat_badan') ?? 0;
            $user->password = bcrypt($request->input('password'));
            $user->save();
            return response()->json(['success' => 'User berhasil diupdate.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function indexDokter()
    {
        return view('dokter.profil');
    }
    
    public function editDokter()
    { 
        $userId = Auth::id();
        $users = User::findOrFail($userId);
        return view('dokter.profil-edit', compact('users'));
    }

    public function indexApoteker()
    {
        return view('apoteker.profil');
    }

    public function editApoteker()
    { 
        $userId = Auth::id();
        $users = User::findOrFail($userId);
        return view('apoteker.profil-edit', compact('users'));
    }
}
