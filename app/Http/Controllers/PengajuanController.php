<?php

namespace App\Http\Controllers;

use App\Http\Requests\PemeriksaanUpdateStatusRequest;
use App\Http\Requests\PengajuanEditRequest;
use App\Http\Requests\PengajuanTambahRequest;
use App\Http\Requests\PengajuanUpdateStatusRequest;
use App\Models\Pengajuan;
use App\Models\Poli;
use App\Models\Rekap;
use App\Models\User;
use App\Services\SQL\AdminPengajuanSQL;
use App\Services\SQL\PasienPengajuanSQL;
use App\Services\SQL\DokterPengajuanSQL;
use App\Services\SQL\DokterPemeriksaanSQL;
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
    protected $DokterPemeriksaan;

    public function __construct(AdminPengajuanSQL $AdminPengajuanSQL, PasienPengajuanSQL $PasienPengajuanSQL, DokterPengajuanSQL $DokterPengajuanSQL, DokterPemeriksaanSQL $DokterPemeriksaanSQL)
    {
        $this->DataPengajuan = $AdminPengajuanSQL;
        $this->PasienPengajuan = $PasienPengajuanSQL;
        $this->DokterPengajuan = $DokterPengajuanSQL;
        $this->DokterPemeriksaan = $DokterPemeriksaanSQL;
    }

    public function index()
    {
        $dokters = User::where('role', 'Dokter')->get();
        $pasiens = User::where('role', 'Pasien')->get();
        return view('admin.pengajuan', compact('dokters', 'pasiens'));
    }

    public function read()
    {
        $data = $this->DataPengajuan->getPengajuanData();

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
        $statusAwal = "Pending";
        $statusQr = "null";
        $catatan = "Tidak ada catatan";

        $pengajuan = new Pengajuan();
        $pengajuan->id_pasien = $pasienId;
        $pengajuan->keluhan = $request->keluhan;
        $pengajuan->id_poli = $request->poli;
        $pengajuan->status = $statusAwal;
        $pengajuan->tanggal_pengajuan = Carbon::now();
        $pengajuan->tanggal_pemeriksaan = $request->tanggal_pemeriksaan;
        $pengajuan->status_qrcode = $statusQr;
        $pengajuan->catatan = $catatan;
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
            $dokterId = Auth::id();
            $pengajuan = Pengajuan::findOrFail($request->id);
            $pengajuan->status = $request->status;
            $pengajuan->id_dokter = $dokterId;
            if ($request->status === 'Diterima') {
                $statusQRAktif = "aktif";
                // Generate QR Code URL
                $qrCodeUrl = route('update-status-from-qr', ['id' => $pengajuan->id]);
                // Generate QR Code image
                $qrCodeImage = QrCode::format('png')->size(300)->generate($qrCodeUrl);
                $qrCodePath = 'qr_codes/' . $pengajuan->id . '.png';
                Storage::put($qrCodePath, $qrCodeImage);
                $pengajuan->qrcode = Storage::url($qrCodePath);
                $pengajuan->status_qrcode = $statusQRAktif;
            } else {
                $pengajuan->qrcode = "null";
                $pengajuan->status_qrcode = "null";
            }
            $pengajuan->save();
            return response()->json(['success' => 'Status pengajuan berhasil diperbarui.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function scanQr($id)
    {
        try {
            $pengajuan = Pengajuan::findOrFail($id);
            // handler jika qr code expired
            if ($pengajuan->status_qrcode === 'expired') {
                return response()->json(['error' => 'QR code sudah expired.'], 400);
            }
            $pengajuan->status = 'Diproses';
            $pengajuan->status_qrcode = 'expired';
            $pengajuan->save();
            return response()->json(['success' => 'Status pengajuan berhasil diperbarui.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function readPemeriksaan()
    {
        $data = $this->DokterPemeriksaan->getPemeriksaanData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function storePemeriksaan(PemeriksaanUpdateStatusRequest $request)
    {
        $pengajuanId = $request->id_pengajuan;
        $pengajuan = Pengajuan::find($pengajuanId);
        $pengajuan->status = "Selesai";
        $pengajuan->catatan = $request->catatan ?? "Tidak ada catatan";
        $pengajuan->save();

        if ($request->hasFile('surat_perizinan_file')) {
            $path = $request->file('surat_perizinan_file')->store('public/pdf');
        } else {
            $path = null;
        }
        

        $noRekap = 'RKP' . now()->format('dmY') . $pengajuanId;
        $rekap = new Rekap();
        $rekap->no_rekap = $noRekap;
        $rekap->id_pasien = $request->id_pasien;
        $rekap->id_dokter = $request->id_dokter;
        $rekap->id_pengajuan = $request->id_pengajuan;
        $rekap->qrcode = $request->qrcode;
        $rekap->surat_izin = $path;
        $rekap->save();

        return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui.');
    }
}
