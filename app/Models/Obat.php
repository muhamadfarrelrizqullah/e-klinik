<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JenisObat;

class Obat extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'id_jenis', 'qty', 'satuan'];

    public function jenisObat()
    {
        return $this->belongsTo(JenisObat::class, 'id_jenis');
    }
}
