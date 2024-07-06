<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Rekap;

class Pengajuan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id_pasien', 'id_dokter', 'keluhan', 'status', 'tanggal_pengajuan', 
        'tanggal_pemeriksaan', 'qrcode', 'status_qrcode', 'catatan'
    ];

    public function pasien()
    {
        return $this->belongsTo(User::class, 'id_pasien');
    }

    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }

    public function rekaps()
    {
        return $this->hasMany(Rekap::class, 'id_pengajuan');
    }
}
