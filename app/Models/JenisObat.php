<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Obat;

class JenisObat extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nama'];

    public function obats()
    {
        return $this->hasMany(Obat::class, 'id_jenis');
    }
}
