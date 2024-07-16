<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfilController extends Controller
{
    public function index()
    {
        return view('admin.profil');
    }

    public function indexPasien()
    {
        return view('pasien.profil');
    }

    public function edit()
    { 
        $userId = Auth::id();
        $users = User::findOrFail($userId);
        return view('admin.profil-edit', compact('users'));
    }

    public function update(Request $request)
    {
        try {
            $userId = Auth::id();
            $request->validate([
                'name' => 'required|string|max:255',
                'tinggi_badan' => 'required',
                'berat_badan' => 'required',
                'password' => 'required|string|min:5',
                'confirmPassword' => 'required|string|same:password',
            ]);
            $user = User::findOrFail($userId);
            $user->name = $request->input('name');
            $user->name = $request->input('tinggi_badan');
            $user->name = $request->input('berat_badan');
            $user->password = bcrypt($request->input('password'));
            $user->save();
            return response()->json(['success' => 'User updated successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
