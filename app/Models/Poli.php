<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poli extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nama'];

    public function pivotPolisUsers()
    {
        return $this->hasMany(PivotPolisUser::class, 'id_poli');
    }
}
