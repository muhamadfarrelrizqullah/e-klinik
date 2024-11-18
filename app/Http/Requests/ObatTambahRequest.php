<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObatTambahRequest extends FormRequest
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
            'qty' => 'required|integer|min:1',
            'satuan' => 'required|string|max:50',
            'jenis_obat' => 'required|string|max:100',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'qty.required' => 'Kuantitas (qty) harus diisi.',
            'qty.integer' => 'Kuantitas harus berupa angka.',
            'qty.min' => 'Kuantitas minimal adalah 1.',
            'satuan.required' => 'Satuan harus diisi.',
            'satuan.string' => 'Satuan harus berupa teks.',
            'satuan.max' => 'Satuan maksimal 50 karakter.',
            'jenis_obat.required' => 'Jenis Obat harus diisi.',
            'jenis_obat.string' => 'Jenis Obat harus berupa teks.',
            'jenis_obat.max' => 'Jenis Obat maksimal 100 karakter.',
        ];
    }
}
