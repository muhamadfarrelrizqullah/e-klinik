<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengajuanTambahRequest extends FormRequest
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
            'pasien' => 'nullable|exists:users,id',
            'dokter' => 'nullable|exists:users,id',
            'poli' => 'required|exists:polis,id',
            'keluhan' => 'required|string|max:255',
            'status' => 'nullable|in:Pending,Ditolak,Diterima,Diproses,Selesai',
            'tanggal_pengajuan' => 'nullable|date|date_format:Y-m-d',
            'tanggal_pemeriksaan' => 'required|date|date_format:Y-m-d',
            'catatan' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'pasien.exists' => 'Pasien yang dipilih tidak valid.',
            'dokter.exists' => 'Dokter yang dipilih tidak valid.',
            'poli.exists' => 'Poli yang dipilih tidak valid.',
            'poli.required' => 'Poli harus diisi.',
            'keluhan.required' => 'Keluhan harus diisi.',
            'keluhan.string' => 'Keluhan harus berupa teks.',
            'keluhan.max' => 'Keluhan maksimal 255 karakter.',
            'status.in' => 'Status tidak valid.',
            'tanggal_pengajuan.date' => 'Tanggal pengajuan harus berupa tanggal yang valid.',
            'tanggal_pengajuan.date_format' => 'Tanggal pengajuan harus dalam format YYYY-MM-DD.',
            'tanggal_pemeriksaan.required' => 'Tanggal Pemeriksaan harus diisi.',
            'tanggal_pemeriksaan.date' => 'Tanggal pemeriksaan harus berupa tanggal yang valid.',
            'tanggal_pemeriksaan.date_format' => 'Tanggal pemeriksaan harus dalam format YYYY-MM-DD.',
            'catatan.string' => 'Catatan harus berupa teks.',
            'catatan.max' => 'Catatan maksimal 255 karakter.',
        ];
    }
}
