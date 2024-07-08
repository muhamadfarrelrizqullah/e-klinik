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
            ->where('users.role', '=', 'Dokter')
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
