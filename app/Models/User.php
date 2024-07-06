<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Divisi;
use App\Models\Pengajuan;
use App\Models\Rekap;
use App\Models\PivotPolisUser;



class User extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nip', 'nama', 'password', 'status', 'role', 'divisi_id', 
        'tanggal_lahir', 'tinggi_badan', 'berat_badan'
    ];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function pengajuansAsPasien()
    {
        return $this->hasMany(Pengajuan::class, 'id_pasien');
    }

    public function pengajuansAsDokter()
    {
        return $this->hasMany(Pengajuan::class, 'id_dokter');
    }

    public function rekapsAsPasien()
    {
        return $this->hasMany(Rekap::class, 'id_pasien');
    }

    public function rekapsAsDokter()
    {
        return $this->hasMany(Rekap::class, 'id_dokter');
    }

    public function pivotPolisUsers()
    {
        return $this->hasMany(PivotPoliUser::class, 'id_dokter');
    }
}
