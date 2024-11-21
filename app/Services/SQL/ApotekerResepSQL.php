<?php

namespace App\Services\SQL;

use App\Models\Pengajuan;
use Illuminate\Support\Facades\DB;

class ApotekerResepSQL
{
    public function getResepData($id_pasien, $id_dokter, $tanggal_dibuat)
    {
        $query = Pengajuan::leftJoin('users as pasien', 'pengajuans.id_pasien', '=', 'pasien.id')
            ->leftJoin('users as dokter', 'pengajuans.id_dokter', '=', 'dokter.id')
            ->leftJoin('polis', 'pengajuans.id_poli', '=', 'polis.id')
            ->leftJoin('divisis', 'pasien.divisi_id', '=', 'divisis.id')
            ->join('reseps', 'reseps.id_pengajuan', '=', 'pengajuans.id')
            ->leftJoin('detail_reseps', 'detail_reseps.id_resep', '=', 'reseps.id')
            ->leftJoin('obats', 'detail_reseps.id_obat', '=', 'obats.id')
            ->select([
                'reseps.id as id_resep',
                'reseps.kode_resep',
                'reseps.status as status_resep',
                'reseps.created_at as tanggal_dibuat',
                'pengajuans.id as id_pengajuan',
                'pengajuans.keluhan',
                'pengajuans.status as status_pengajuan',
                'pengajuans.tanggal_pengajuan',
                'pengajuans.tanggal_pemeriksaan',
                'pasien.nip as nip_pasien',
                'pasien.nama as nama_pasien',
                'dokter.nip as nip_dokter',
                'dokter.nama as nama_dokter',
                DB::raw('STRING_AGG(obats.nama, \', \') as nama_obat'),
                DB::raw('STRING_AGG(detail_reseps.jumlah::text, \', \') as jumlah_obat')
            ]);

        // Filter berdasarkan id_pasien
        if ($id_pasien) {
            $query->where('pengajuans.id_pasien', $id_pasien);
        }

        // Filter berdasarkan id_dokter
        if ($id_dokter) {
            $query->where('pengajuans.id_dokter', $id_dokter);
        }

        // Tambahkan filter berdasarkan input tanggal
        if ($tanggal_dibuat) {
            $query->whereDate('reseps.created_at', '=', $tanggal_dibuat);
        }

        // Grouping by id_resep
        $query->groupBy([
            'reseps.id',
            'reseps.kode_resep',
            'reseps.status',
            'reseps.created_at',
            'pengajuans.id',
            'pengajuans.keluhan',
            'pengajuans.status',
            'pengajuans.tanggal_pengajuan',
            'pengajuans.tanggal_pemeriksaan',
            'pasien.nip',
            'pasien.nama',
            'dokter.nip',
            'dokter.nama'
        ]);

        return $query->get();
    }
}
