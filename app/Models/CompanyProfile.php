<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'main_page_header',
        'main_page_title',
        'second_page_header',
        'second_page_title',
        'second_page_desc',
        'third_page_header',
        'third_page_title',
        'third_page_desc',
    ];
}
