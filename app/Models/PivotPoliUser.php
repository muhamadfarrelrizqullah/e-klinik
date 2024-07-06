<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Poli;
use App\Models\User;

class PivotPoliUser extends Model
{
    use HasFactory;

    protected $fillable = ['id_dokter', 'id_poli'];

    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }
}
