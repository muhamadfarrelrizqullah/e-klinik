<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Divisi;
use App\Models\Pengajuan;
use App\Models\Rekap;
use App\Models\PivotPolisUser;
use App\Models\Rating;



class User extends Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $fillable = [
        'nip',
        'nama',
        'password',
        'status',
        'role',
        'divisi_id',
        'jabatan',
        'tanggal_lahir',
        'tinggi_badan',
        'berat_badan'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'password' => 'hashed'
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

    public function ratingsAsPasien()
    {
        return $this->hasMany(Rating::class, 'id_pasien');
    }

    public function ratingsAsDokter()
    {
        return $this->hasMany(Rating::class, 'id_dokter');
    }

    public function jadwalDokters()
    {
        return $this->hasMany(JadwalDokter::class, 'id_dokter');
    }
}
