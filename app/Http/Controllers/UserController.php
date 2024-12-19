<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserResetPWRequest;
use App\Http\Requests\UserTambahRequest;
use App\Models\Divisi;
use App\Models\Poli;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Services\SQL\AdminUserSQL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $DataUser;

    public function __construct(AdminUserSQL $AdminUserSQL)
    {
        $this->DataUser = $AdminUserSQL;
    }

    public function index()
    {
        $divisis = Divisi::all();
        $polis = Poli::all();
        return view('admin.user', compact('divisis', 'polis'));
    }

    public function readPasien()
    {
        $data = $this->DataUser->getPasienData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function readDokter()
    {
        $data = $this->DataUser->getDokterData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function readAdmin()
    {
        $data = $this->DataUser->getAdminData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function readApoteker()
    {
        $data = $this->DataUser->getApotekerData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function store(UserTambahRequest $request)
    {
        $user = new User;
        $user->nip = $request->nip;
        $user->nama = $request->nama;
        $user->status = $request->status;
        $user->role = $request->role;
        $user->divisi_id = $request->divisi;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->tinggi_badan = $request->tinggi_badan ?? 0;
        $user->berat_badan = $request->berat_badan ?? 0;

        $tanggal_lahir = \Carbon\Carbon::parse($request->tanggal_lahir);
        $password = $tanggal_lahir->format('dmY');
        $user->password = Hash::make($password);

        if ($request->role === 'Pasien') {
            $user->jabatan = $request->jabatan;
        }
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/fotos', $fileName);
            $user->foto = $fileName;
        } else {
            $user->foto = null;
        }    
        $user->save();

        if ($request->has('polis')) {
            foreach ($request->polis as $poliId) {
                DB::table('pivot_polis_users')->insert([
                    'id_dokter' => $user->id,
                    'id_poli' => $poliId,
                ]);
            }
        }

        return redirect()->back()->with('success', 'User berhasil ditambah.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User tidak ada.'], 404);
        }
        $user->delete();
        return response()->json(['message' => 'User berhasil dihapus.']);
    }

    public function update(UserEditRequest $request)
    {
        try {
            $userId = Auth::id();
            $user = User::findOrFail($request->id);
            if ($userId === $user->id) {
                return response()->json(['message' => 'Anda tidak dapat mengedit data Anda sendiri.'], 403);
            }
            $user->nip = $request->nip;
            $user->nama = $request->nama;
            $user->status = $request->status;
            $user->role = $request->role;
            $user->divisi_id = $request->divisi;
            $user->tanggal_lahir = $request->tanggal_lahir;
            $user->tinggi_badan = $request->tinggi_badan ?? 0;
            $user->berat_badan = $request->berat_badan ?? 0;
            if ($request->role === 'Pasien') {
                $user->jabatan = $request->jabatan;
            }
            $user->save();

            DB::table('pivot_polis_users')->where('id_dokter', $user->id)->delete();
            if ($request->has('polis')) {
                foreach ($request->polis as $poliId) {
                    DB::table('pivot_polis_users')->insert([
                        'id_dokter' => $user->id,
                        'id_poli' => $poliId,
                    ]);
                }
            }
            return response()->json(['success' => 'User berhasil diupdate.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function resetPassword(UserResetPWRequest $request)
    {
        try {
            $user = User::findOrFail($request->id);
            $tanggal_lahir = \Carbon\Carbon::parse($request->tanggal_lahir);
            $newPassword = $tanggal_lahir->format('dmY');
            $user->password = Hash::make($newPassword);
            $user->save();
            return response()->json(['success' => 'Password berhasil direset.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
