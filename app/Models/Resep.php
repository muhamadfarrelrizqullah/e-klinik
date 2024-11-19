<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resep extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id_pengajuan',
        'kode_resep',
        'status'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id_pengajuan');
    }

    public function detailResep()
    {
        return $this->hasMany(DetailResep::class, 'id_resep');
    }
}
