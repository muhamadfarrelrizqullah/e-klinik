<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function indexAdmin()
    {
        $companyProfiles = CompanyProfile::all();
        return view('admin.profil-perusahaan', compact('companyProfiles'));
    }

    public function read()
    {
        $data = CompanyProfile::all();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'field' => 'required|string',
            'value' => 'required|string',
        ]);

        $pengaturan = CompanyProfile::findOrFail($validated['id']);
        $pengaturan->{$validated['field']} = $validated['value'];
        $pengaturan->save();

        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui.']);
    }
}
