<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengajuanEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|exists:pengajuans,id',
            'pasien' => 'required|exists:users,id',
            'dokter' => 'required|exists:users,id',
            'keluhan' => 'required|string|max:255',
            'status' => 'required|in:Pending,Ditolak,Diterima,Diproses,Selesai',
            'tanggal_pengajuan' => 'required|date|date_format:Y-m-d',
            'tanggal_pemeriksaan' => 'required|date|date_format:Y-m-d',
            'catatan' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'ID tidak ditemukan.',
            'pasien.required' => 'Pasien harus diisi.',
            'pasien.exists' => 'Pasien yang dipilih tidak valid.',
            'dokter.required' => 'Dokter harus diisi.',
            'dokter.exists' => 'Dokter yang dipilih tidak valid.',
            'keluhan.required' => 'Keluhan harus diisi.',
            'keluhan.string' => 'Keluhan harus berupa teks.',
            'keluhan.max' => 'Keluhan maksimal 255 karakter.',
            'status.required' => 'Status harus diisi.',
            'status.in' => 'Status tidak valid.',
            'tanggal_pengajuan.required' => 'Tanggal pengajuan harus diisi.',
            'tanggal_pengajuan.date' => 'Tanggal pengajuan harus berupa tanggal yang valid.',
            'tanggal_pengajuan.date_format' => 'Tanggal pengajuan harus dalam format YYYY-MM-DD.',
            'tanggal_pemeriksaan.required' => 'Tanggal pemeriksaan harus diisi.',
            'tanggal_pemeriksaan.date' => 'Tanggal pemeriksaan harus berupa tanggal yang valid.',
            'tanggal_pemeriksaan.date_format' => 'Tanggal pemeriksaan harus dalam format YYYY-MM-DD.',
            'catatan.string' => 'Catatan harus berupa teks.',
            'catatan.max' => 'Catatan maksimal 255 karakter.',
        ];
    }
}
