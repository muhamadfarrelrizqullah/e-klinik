<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserTambahRequest;
use App\Models\Divisi;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Services\SQL\AdminUserSQL;
use Illuminate\Support\Facades\Auth;
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
        return view('admin.user', compact('divisis'));
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

    public function store(UserTambahRequest $request)
    {
        $user = new User;
        $user->nip = $request->nip;
        $user->nama = $request->nama;
        $user->status = $request->status;
        $user->role = $request->role;
        $user->divisi_id = $request->divisi;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->tinggi_badan = $request->tinggi_badan;
        $user->berat_badan = $request->berat_badan;

        $tanggal_lahir = \Carbon\Carbon::parse($request->tanggal_lahir);
        $password = $tanggal_lahir->format('dmY');
        $user->password = Hash::make($password);
        $user->save();

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

    public function update(Request $request)
    {
        try {
            $userId = Auth::id();
            $request->validate([
                'id' => 'required|exists:users,id',
                'nip' => 'required|digits:8',
                'nama' => 'required|string|max:255',
                'status' => 'required|in:Aktif,Tidak Aktif',
                'role' => 'required|in:Admin,Dokter,Pasien',
                'divisi' => 'required|exists:divisis,id',
                'tanggal_lahir' => 'required|date|date_format:Y-m-d',
                'tinggi_badan' => 'nullable|integer',
                'berat_badan' => 'nullable|integer',
            ]);

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
            $user->tinggi_badan = $request->tinggi_badan;
            $user->berat_badan = $request->berat_badan;
            $user->save();

            return response()->json(['success' => 'User berhasil diupdate.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function resetPassword(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|exists:users,id',
                'tanggal_lahir' => 'required|date|date_format:Y-m-d',
            ]);

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
