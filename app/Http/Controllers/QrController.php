<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

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
}
