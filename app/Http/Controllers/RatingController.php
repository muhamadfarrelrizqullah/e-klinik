<?php

namespace App\Http\Controllers;

use App\Http\Requests\RatingEditRequest;
use App\Models\Rating;
use App\Services\SQL\AdminRatingSQL;
use App\Services\SQL\PasienRatingSQL;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        return view('pasien.rating');
    }

    public function indexAdmin()
    {
        return view('admin.rating');
    }

    protected $DataRating;
    protected $DataRatingAdmin;

    public function __construct(PasienRatingSQL $PasienRatingSQL, AdminRatingSQL $AdminRatingSQL)
    {
        $this->DataRating = $PasienRatingSQL;
        $this->DataRatingAdmin = $AdminRatingSQL;
    }

    public function read()
    {
        $data = $this->DataRating->getRatingData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function readAdmin()
    {
        $data = $this->DataRatingAdmin->getRatingData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function destroy($id)
    {
        $rating = Rating::find($id);
        if (!$rating) {
            return response()->json(['message' => 'Rating tidak ada.'], 404);
        }
        $rating->delete();
        return response()->json(['message' => 'Rating berhasil dihapus.']);
    }

    public function update(RatingEditRequest $request)
    {
        try {
            $rating = Rating::findOrFail($request->id);
            $rating->rating = $request->rating;
            $rating->komentar = $request->komentar?? "Tidak ada komentar";
            $rating->save();
            return response()->json(['success' => 'Rating berhasil diupdate.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
