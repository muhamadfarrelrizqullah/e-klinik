<?php

namespace App\Services\SQL;

use App\Models\Rekap;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminRekamMedisSQL
{
    public function getRekamMedisData()
    {
        $userId = Auth::id();

        return Rekap::join('users as pasien', 'rekaps.id_pasien', '=', 'pasien.id')
            ->leftJoin('users as dokter', 'rekaps.id_dokter', '=', 'dokter.id')
            ->leftJoin('pengajuans', 'rekaps.id_pengajuan', '=', 'pengajuans.id')
            ->leftJoin('polis', 'pengajuans.id_poli', '=', 'polis.id')
            ->leftJoin('ratings', 'pengajuans.id_rating', '=', 'ratings.id')
            ->leftJoin('divisis', 'pasien.divisi_id', '=', 'divisis.id')
            ->leftJoin('reseps', 'pengajuans.id', '=', 'reseps.id_pengajuan')
            ->leftJoin('detail_reseps', 'detail_reseps.id_resep', '=', 'reseps.id')
            ->leftJoin('obats', 'detail_reseps.id_obat', '=', 'obats.id')
            ->select([
                'rekaps.id',
                'rekaps.no_rekap',
                'rekaps.id_pasien',
                'pasien.nip as nip_pasien',
                'pasien.nama as nama_pasien',
                'divisis.nama as divisi_pasien',
                'pasien.jabatan',
                'pasien.tanggal_lahir as ttl_pasien',
                'pasien.tinggi_badan as tb_pasien',
                'pasien.berat_badan as bb_pasien',
                'rekaps.id_dokter',
                'dokter.nama as nama_dokter',
                'rekaps.id_pengajuan',
                'polis.nama as nama_poli',
                'pengajuans.keluhan',
                'pengajuans.status',
                'pengajuans.tanggal_pengajuan',
                'pengajuans.tanggal_pemeriksaan',
                'pengajuans.catatan',
                'pengajuans.status_qrcode',
                'pengajuans.qrcode',
                'ratings.rating',
                'ratings.komentar',
                'rekaps.surat_izin',
                'reseps.kode_resep',
                'reseps.status as status_resep',
                DB::raw('STRING_AGG(obats.nama, \', \') as nama_obat'),
                DB::raw('STRING_AGG(detail_reseps.jumlah::text, \', \') as jumlah_obat')
            ])
            ->groupBy([
                'rekaps.id',
                'rekaps.no_rekap',
                'rekaps.id_pasien',
                'pasien.nip',
                'pasien.nama',
                'divisis.nama',
                'pasien.jabatan',
                'pasien.tanggal_lahir',
                'pasien.tinggi_badan',
                'pasien.berat_badan',
                'rekaps.id_dokter',
                'dokter.nama',
                'rekaps.id_pengajuan',
                'polis.nama',
                'pengajuans.keluhan',
                'pengajuans.status',
                'pengajuans.tanggal_pengajuan',
                'pengajuans.tanggal_pemeriksaan',
                'pengajuans.catatan',
                'pengajuans.status_qrcode',
                'pengajuans.qrcode',
                'ratings.rating',
                'ratings.komentar',
                'rekaps.surat_izin',
                'reseps.kode_resep',
                'reseps.status'
            ])
            ->get();
    }
}
