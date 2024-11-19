<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resep;
use App\Models\Obat;

class DetailResep extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_resep',
        'id_obat',
        'jumlah'
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }

    public function resep()
    {
        return $this->belongsTo(Resep::class, 'id_resep');
    }
}
