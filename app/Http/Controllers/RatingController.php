<?php

namespace App\Http\Controllers;

use App\Services\SQL\PasienRatingSQL;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        return view('pasien.rating');
    }

    protected $DataRating;

    public function __construct(PasienRatingSQL $PasienRatingSQL)
    {
        $this->DataRating = $PasienRatingSQL;
    }

    public function read()
    {
        $data = $this->DataRating->getRatingData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }
}
