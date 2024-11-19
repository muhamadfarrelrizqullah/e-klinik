<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\JenisObat;
use App\Models\DetailResep;

class Obat extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nama', 'id_jenis', 'qty', 'satuan'];

    public function jenisObat()
    {
        return $this->belongsTo(JenisObat::class, 'id_jenis');
    }

    public function detailResep()
    {
        return $this->belongsTo(DetailResep::class, 'id_obat');
    }
}
