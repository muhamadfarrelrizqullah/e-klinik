<?php

namespace App\Services\SQL;

use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;

class DokterPemeriksaanSQL
{
    public function getPemeriksaanData($id_pasien, $data_tanggal, $tanggal_setelah, $tanggal_sebelum)
    {
        $userId = Auth::id();

        $query = Pengajuan::leftJoin('users as pasien', 'pengajuans.id_pasien', '=', 'pasien.id')
            ->leftJoin('users as dokter', 'pengajuans.id_dokter', '=', 'dokter.id')
            ->leftJoin('polis', 'pengajuans.id_poli', '=', 'polis.id')
            ->leftJoin('divisis', 'pasien.divisi_id', '=', 'divisis.id')
            ->join('pivot_polis_users', function ($join) use ($userId) {
                $join->on('pengajuans.id_poli', '=', 'pivot_polis_users.id_poli')
                    ->where(function ($query) use ($userId) {
                        $query->Where('pivot_polis_users.id_dokter', '=', $userId);
                    });
            })
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
                'pasien.tanggal_lahir',
                'divisis.nama as divisi_pasien',
                'pengajuans.id_dokter',
                'dokter.nama as nama_dokter',
                'dokter.nip as nip_dokter',
                'polis.id as id_poli',
                'polis.nama as nama_poli',
            ])
            ->where('pengajuans.status', '=', 'Diproses');

        // Filter berdasarkan id_pasien
        if ($id_pasien) {
            $query->where('pengajuans.id_pasien', $id_pasien);
        }

        // Tambahkan filter berdasarkan input tanggal
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

        return $query->get();
    }
}
