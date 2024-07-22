<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\Pengajuan;

class AutentikasiController extends Controller
{
    public function landing()
    {
        $totalDokter = User::where('role', 'dokter')->count();
        $totalPengajuan = Pengajuan::count();
        $totalPasien = User::where('role', 'pasien')->count();
        return view('landing', compact('totalDokter','totalPengajuan','totalPasien'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    public function loginProcess(LoginRequest $request)
    {
        $credentials = $request->only('nip', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status == 'Aktif') {
                if (Auth::user()->role == 'Admin') {
                    return response()->json(['success' => true, 'redirect' => route('admin-dashboard')]);
                } elseif (Auth::user()->role == 'Dokter') {
                    return response()->json(['success' => true, 'redirect' => route('dokter-dashboard')]);
                } elseif (Auth::user()->role == 'Pasien') {
                    return response()->json(['success' => true, 'redirect' => route('pasien-dashboard')]);
                } else {
                    return response()->json(['success' => false, 'message' => 'Error autentikasi']);
                }
            } else {
                Auth::logout();
                return response()->json(['success' => false, 'message' => 'Akun tidak aktif']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Nip atau password tidak valid']);
        }
    }
}
