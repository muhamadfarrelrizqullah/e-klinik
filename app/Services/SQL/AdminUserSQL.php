<?php

namespace App\Services\SQL;

use App\Models\User;

class AdminUserSQL
{
    public function getPasienData()
    {
        return User::join('divisis', 'users.divisi_id', '=', 'divisis.id')
            ->select([
                'users.id',
                'users.nip',
                'users.nama',
                'users.status',
                'users.role',
                'divisis.id as divisi_id',
                'divisis.nama as divisi_nama',
                'users.tanggal_lahir',
                'users.tinggi_badan',
                'users.berat_badan',
            ])
            ->where('users.role', '=', 'Pasien')
            ->get();
    }

    public function getDokterData()
    {
        return User::join('divisis', 'users.divisi_id', '=', 'divisis.id')
            ->leftJoin('pivot_polis_users', 'users.id', '=', 'pivot_polis_users.id_dokter')
            ->leftJoin('polis', 'pivot_polis_users.id_poli', '=', 'polis.id')
            ->select([
                'users.id',
                'users.nip',
                'users.nama',
                'users.status',
                'users.role',
                'divisis.id as divisi_id',
                'divisis.nama as divisi_nama',
                'users.tanggal_lahir',
                'users.tinggi_badan',
                'users.berat_badan',
            ])
            ->selectRaw("string_agg(polis.nama, ', ') as poli_nama")
            ->selectRaw("string_agg(polis.id::text, ', ') as poli_id")
            ->where('users.role', '=', 'Dokter')
            ->groupBy(
                'users.id',
                'users.nip',
                'users.nama',
                'users.status',
                'users.role',
                'divisis.id',
                'divisis.nama',
                'users.tanggal_lahir',
                'users.tinggi_badan',
                'users.berat_badan'
            )
            ->get();
    }


    public function getAdminData()
    {
        return User::join('divisis', 'users.divisi_id', '=', 'divisis.id')
            ->select([
                'users.id',
                'users.nip',
                'users.nama',
                'users.status',
                'users.role',
                'divisis.id as divisi_id',
                'divisis.nama as divisi_nama',
                'users.tanggal_lahir',
                'users.tinggi_badan',
                'users.berat_badan',
            ])
            ->where('users.role', '=', 'Admin')
            ->get();
    }
}
