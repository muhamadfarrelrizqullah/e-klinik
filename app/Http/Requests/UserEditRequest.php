<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'id' => 'required|exists:users,id',
            'nip' => 'required|digits:8',
            'nama' => 'required|string|max:255',
            'status' => 'required|in:Aktif,Tidak Aktif',
            'role' => 'required|in:Admin,Dokter,Pasien',
            'divisi' => 'required|exists:divisis,id',
            'tanggal_lahir' => 'required|date|date_format:Y-m-d',
            'tinggi_badan' => 'nullable|integer',
            'berat_badan' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'ID tidak ditemukan.',
            'nip.required' => 'NIP harus diisi.',
            'nip.digits' => 'NIP harus terdiri dari 8 digit.',
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'status.required' => 'Status harus diisi.',
            'status.in' => 'Status harus berupa Aktif atau Tidak Aktif.',
            'role.required' => 'Role harus diisi.',
            'role.in' => 'Role harus berupa Admin, Dokter, atau Pasien.',
            'divisi.required' => 'Divisi harus diisi.',
            'divisi.exists' => 'Divisi yang dipilih tidak valid.',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'tanggal_lahir.date_format' => 'Tanggal lahir harus dalam format YYYY-MM-DD.',
            'tinggi_badan.integer' => 'Tinggi badan harus berupa angka.',
            'berat_badan.integer' => 'Berat badan harus berupa angka.',
        ];
    }
}
