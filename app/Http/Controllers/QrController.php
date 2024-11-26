<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Services\SQL\AdminRekapSQL;

class QrController extends Controller
{
    // public function indexDokter()
    // {
    //     return view('dokter.scan-qr');
    // }

    public function indexAdmin()
    {
        return view('admin.scan-qr');
    }

    public function indexDokter()
    {
        return view('dokter.scan-qr');
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

    protected $DataRekap;

    public function __construct(AdminRekapSQL $AdminRekapSQL)
    {
        $this->DataRekap = $AdminRekapSQL;
    }

    public function readQr($id)
    {
        $data = $this->DataRekap->getRekapData($id);

        if ($data->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan.']);
        }

        return response()->json([
            'success' => true,
            'data' => $data->first()
        ]);
    }
}
