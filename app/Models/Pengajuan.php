<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Rekap;
use App\Models\Poli;
use App\Models\Rating;
use App\Models\Resep;

class Pengajuan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id_pasien', 'id_dokter', 'id_poli', 'keluhan', 'status', 'tanggal_pengajuan', 
        'tanggal_pemeriksaan', 'qrcode', 'status_qrcode', 'catatan', 'id_rating'
    ];

    public function pasien()
    {
        return $this->belongsTo(User::class, 'id_pasien');
    }

    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }

    public function rating()
    {
        return $this->belongsTo(Rating::class, 'id_rating');
    }

    public function rekaps()
    {
        return $this->hasMany(Rekap::class, 'id_pengajuan');
    }

    public function reseps()
    {
        return $this->belongsTo(Resep::class, 'id_pengajuan');
    }
}
