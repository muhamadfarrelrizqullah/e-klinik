<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalDokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_dokter', 'hari', 'jam_mulai', 'jam_selesai'
    ];

    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }
}
