<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyProfile;

class PengaturanHalaman extends Controller
{
    public function indexAdmin()
    {
        $companyProfiles = CompanyProfile::all();
        dd($companyProfiles);
        return view('admin.pengaturan-halaman' , compact('companyProfiles'));
    }

    public function update(Request $request)
{
    $attribute = $request->input('attribute');
    $value = $request->input('value');

    $companyProfile = CompanyProfile::first();
    $companyProfile->update([$attribute => $value]);

    return redirect()->back()->with('success', 'Data berhasil diperbarui.');
}

}
