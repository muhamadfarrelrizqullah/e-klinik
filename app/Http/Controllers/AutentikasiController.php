<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class AutentikasiController extends Controller
{
    public function landing()
    {
        return view('landing');
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
                    return response()->json(['success' => false, 'message' => 'Error Auth']);
                }
            } else {
                Auth::logout();
                return response()->json(['success' => false, 'message' => 'Account is not active']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid nip or password']);
        }
    }
}
