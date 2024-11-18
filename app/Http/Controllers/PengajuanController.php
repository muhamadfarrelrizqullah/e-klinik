<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengajuanAddRatingRequest;
use App\Http\Requests\PengajuanEditRequest;
use App\Http\Requests\PengajuanTambahRequest;
use App\Http\Requests\PengajuanUpdateStatusRequest;
use App\Models\Pengajuan;
use App\Models\Poli;
use App\Models\Rating;
use App\Models\Rekap;
use App\Models\User;
use App\Services\SQL\AdminPengajuanSQL;
use App\Services\SQL\PasienPengajuanSQL;
use App\Services\SQL\DokterPengajuanSQL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    protected $DataPengajuan;
    protected $PasienPengajuan;
    protected $DokterPengajuan;

    public function __construct(AdminPengajuanSQL $AdminPengajuanSQL, PasienPengajuanSQL $PasienPengajuanSQL, DokterPengajuanSQL $DokterPengajuanSQL)
    {
        $this->DataPengajuan = $AdminPengajuanSQL;
        $this->PasienPengajuan = $PasienPengajuanSQL;
        $this->DokterPengajuan = $DokterPengajuanSQL;
    }

    public function index()
    {
        $dokters = User::where('role', 'Dokter')->orderBy('nama', 'asc')->get();
        $pasiens = User::where('role', 'Pasien')->orderBy('nama', 'asc')->get();
        return view('admin.pengajuan', compact('dokters', 'pasiens'));
    }

    public function read(Request $request)
    {
        $id_pasien = $request->input('id_pasien');
        $data_tanggal = $request->input('data_tanggal');
        $tanggal_setelah = $request->input('tanggal_setelah');
        $tanggal_sebelum = $request->input('tanggal_sebelum');

        $data = $this->DataPengajuan->getPengajuanData($id_pasien, $data_tanggal, $tanggal_setelah, $tanggal_sebelum);

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function destroy($id)
    {
        $pengajuan = Pengajuan::find($id);
        if (!$pengajuan) {
            return response()->json(['message' => 'Pengajuan tidak ada.'], 404);
        }
        $pengajuan->delete();
        return response()->json(['message' => 'Pengajuan berhasil dihapus.']);
    }

    public function update(PengajuanEditRequest $request)
    {
        try {
            $pengajuan = Pengajuan::findOrFail($request->id);
            $pengajuan->id_pasien = $request->pasien;
            $pengajuan->id_dokter = $request->dokter;
            $pengajuan->keluhan = $request->keluhan;
            $pengajuan->status = $request->status;
            $pengajuan->tanggal_pengajuan = $request->tanggal_pengajuan;
            $pengajuan->tanggal_pemeriksaan = $request->tanggal_pemeriksaan;
            $pengajuan->catatan = $request->catatan ?? "Tidak ada catatan";
            $pengajuan->save();
            return response()->json(['success' => 'Pengajuan berhasil diupdate.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function indexPasien()
    {
        $polis = Poli::all();
        $userId = Auth::id();
        $users = User::findOrFail($userId);
        return view('pasien.pengajuan', compact('polis', 'users'));
    }

    public function readPasien()
    {
        $data = $this->PasienPengajuan->getPengajuanData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function store(PengajuanTambahRequest $request)
    {
        $pasienId = Auth::id();

        $pengajuan = new Pengajuan();
        $pengajuan->id_pasien = $pasienId;
        $pengajuan->keluhan = $request->keluhan;
        $pengajuan->id_poli = $request->poli;
        $pengajuan->status = "Diterima";
        $pengajuan->tanggal_pengajuan = Carbon::now();
        $pengajuan->tanggal_pemeriksaan = $request->tanggal_pemeriksaan;
        $pengajuan->status_qrcode = "aktif";
        $pengajuan->catatan = "Tidak ada catatan";
        $pengajuan->save();

        // Generate QR Code URL
        $qrCodeUrl = route('update-status-from-qr', ['id' => $pengajuan->id]);
        // Generate QR Code image
        $qrCodeImage = QrCode::format('png')->size(300)->generate($qrCodeUrl);
        $qrCodePath = 'public/qr_codes/' . $pengajuan->id . '.png';
        Storage::put($qrCodePath, $qrCodeImage);
        $pengajuan->qrcode = Storage::url($qrCodePath);
        $pengajuan->save();

        $user = User::find($pasienId);
        $user->tinggi_badan = $request->tinggi_badan ?? 0;
        $user->berat_badan = $request->berat_badan ?? 0;
        $user->save();

        return redirect()->back()->with('success', 'Pengajuan berhasil ditambah.');
    }

    public function indexDokter()
    {
        $polis = Poli::all();
        $userId = Auth::id();
        $users = User::findOrFail($userId);
        return view('dokter.pengajuan', compact('polis', 'users'));
    }

    public function readDokter()
    {
        $data = $this->DokterPengajuan->getPengajuanData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function updateStatus(PengajuanUpdateStatusRequest $request)
    {
        try {
            $pengajuan = Pengajuan::findOrFail($request->id);
            $pengajuan->status = $request->status;
            if ($request->status === 'Ditolak') {
                $pengajuan->qrcode = "null";
                $pengajuan->status_qrcode = "null";
                $pengajuan->catatan = $request->catatan;
            } else {
                $pengajuan->status_qrcode = "expired";
            }
            $pengajuan->save();
            return response()->json(['success' => 'Status pengajuan berhasil diperbarui.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function tolakPengajuanHariIni(Request $request)
    {
        try {
            $today = now()->toDateString();
            $pengajuan = Pengajuan::whereDate('tanggal_pemeriksaan', $today)->get();

            foreach ($pengajuan as $item) {
                $item->status = 'Ditolak';
                $item->qrcode = "null";
                $item->status_qrcode = "null";
                $item->catatan = "Melebihi batas jam operasional";
                $item->save();
            }

            return response()->json(['success' => 'Semua pengajuan hari ini berhasil ditolak.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function addRating(PengajuanAddRatingRequest $request)
    {
        $rating = new Rating();
        $rating->rating = $request->rating;
        $rating->komentar = $request->komentar ?? "Tidak ada komentar";
        $rating->save();
        $pengajuan = Pengajuan::find($request->id_pengajuan);
        if ($pengajuan) {
            $pengajuan->id_rating = $rating->id;
            $pengajuan->save();
        }


        return redirect()->back()->with('success', 'Rating berhasil ditambah.');
    }

    // public function updateStatus(PengajuanUpdateStatusRequest $request)
    // {
    //     try {
    //         $dokterId = Auth::id();
    //         $pengajuan = Pengajuan::findOrFail($request->id);
    //         $pengajuan->status = $request->status;
    //         $pengajuan->id_dokter = $dokterId;
    //         if ($request->status === 'Diterima') {
    //             $statusQRAktif = "aktif";
    //             // Generate QR Code URL
    //             $qrCodeUrl = route('update-status-from-qr', ['id' => $pengajuan->id]);
    //             // Generate QR Code image
    //             $qrCodeImage = QrCode::format('png')->size(300)->generate($qrCodeUrl);
    //             $qrCodePath = 'qr_codes/' . $pengajuan->id . '.png';
    //             Storage::put($qrCodePath, $qrCodeImage);
    //             $pengajuan->qrcode = Storage::url($qrCodePath);
    //             $pengajuan->status_qrcode = $statusQRAktif;
    //         } else {
    //             $pengajuan->qrcode = "null";
    //             $pengajuan->status_qrcode = "null";
    //         }
    //         $pengajuan->save();
    //         return response()->json(['success' => 'Status pengajuan berhasil diperbarui.']);
    //     } catch (\Throwable $th) {
    //         return response()->json(['message' => $th->getMessage()], 500);
    //     }
    // }

    // public function scanQr($id)
    // {
    //     try {
    //         $pengajuan = Pengajuan::findOrFail($id);
    //         // handler jika qr code expired
    //         if ($pengajuan->status_qrcode === 'expired') {
    //             return response()->json(['error' => 'QR code sudah expired.'], 400);
    //         }
    //         $pengajuan->status = 'Diproses';
    //         $pengajuan->status_qrcode = 'expired';
    //         $pengajuan->save();
    //         return response()->json(['success' => 'Status pengajuan berhasil diperbarui.']);
    //     } catch (\Throwable $th) {
    //         return response()->json(['message' => $th->getMessage()], 500);
    //     }
    // }
}
