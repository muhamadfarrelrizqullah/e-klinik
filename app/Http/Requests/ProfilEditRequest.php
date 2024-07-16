<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfilEditRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date|date_format:Y-m-d',
            'tinggi_badan' => 'nullable|integer',
            'berat_badan' => 'nullable|integer',
            'password' => 'required|string|min:8',
            'confirmPassword' => 'required|string|same:password',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'tanggal_lahir.date_format' => 'Format tanggal lahir harus yyyy-mm-dd.',
            'tinggi_badan.integer' => 'Tinggi badan harus berupa angka.',
            'berat_badan.integer' => 'Berat badan harus berupa angka.',
            'password.required' => 'Password wajib diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password minimal harus 8 karakter.',
            'confirmPassword.required' => 'Konfirmasi password wajib diisi.',
            'confirmPassword.string' => 'Konfirmasi password harus berupa teks.',
            'confirmPassword.same' => 'Password konfirmasi harus sama dengan password.',
        ];
    }
}
