<?php

namespace App\Services\SQL;

use App\Models\Pengajuan;

class AdminPengajuanSQL
{
    public function getPengajuanData($id_pasien, $data_tanggal, $tanggal_setelah, $tanggal_sebelum)
    {
        $query = Pengajuan::leftJoin('users as pasien', 'pengajuans.id_pasien', '=', 'pasien.id')
            ->leftJoin('users as dokter', 'pengajuans.id_dokter', '=', 'dokter.id')
            ->leftJoin('polis', 'pengajuans.id_poli', '=', 'polis.id')
            ->leftJoin('rekaps', 'pengajuans.id', '=', 'rekaps.id_pengajuan')
            ->select([
                'pengajuans.id',
                'pengajuans.keluhan',
                'pengajuans.status',
                'pengajuans.tanggal_pengajuan',
                'pengajuans.tanggal_pemeriksaan',
                'pengajuans.qrcode',
                'pengajuans.status_qrcode',
                'pengajuans.catatan',
                'pengajuans.id_pasien',
                'pasien.nama as nama_pasien',
                'pasien.nip as nip_pasien',
                'pengajuans.id_dokter',
                'dokter.nama as nama_dokter',
                'dokter.nip as nip_dokter',
                'polis.id as id_poli',
                'polis.nama as nama_poli',
                'rekaps.surat_izin',
            ]);
        
        // Filter berdasarkan id_pasien
        if ($id_pasien) {
            $query->where('pengajuans.id_pasien', $id_pasien);
        }

        // Tambahkan filter berdasarkan input yang diterima
        if ($data_tanggal === 'tanggal_pengajuan') {
            if ($tanggal_setelah) {
                $query->where('pengajuans.tanggal_pengajuan', '>=', $tanggal_setelah);
            }
            if ($tanggal_sebelum) {
                $query->where('pengajuans.tanggal_pengajuan', '<=', $tanggal_sebelum);
            }
        } elseif ($data_tanggal === 'tanggal_pemeriksaan') {
            if ($tanggal_setelah) {
                $query->where('pengajuans.tanggal_pemeriksaan', '>=', $tanggal_setelah);
            }
            if ($tanggal_sebelum) {
                $query->where('pengajuans.tanggal_pemeriksaan', '<=', $tanggal_sebelum);
            }
        }

        // Eksekusi query dan map status
        return $query->get()->map(function ($item) {
            switch ($item->status) {
                case 'Diterima':
                    $item->status_order = 1;
                    break;
                case 'Diproses':
                    $item->status_order = 2;
                    break;
                case 'Ditolak':
                    $item->status_order = 3;
                    break;
                case 'Selesai':
                    $item->status_order = 4;
                    break;
                default:
                    $item->status_order = 5;
                    break;
            }
            return $item;
        });
    }
}
