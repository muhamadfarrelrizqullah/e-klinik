<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResepTambahRequest extends FormRequest
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
            'obat' => 'required|array',
            'obat.*.id_obat' => 'required|exists:obats,id',
            'obat.*.jumlah' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'obat.required' => 'Detail obat wajib diisi.',
            'obat.array' => 'Detail obat harus berupa array.',
            'obat.*.id_obat.required' => 'Obat wajib diisi.',
            'obat.*.id_obat.exists' => 'Obat tidak valid.',
            'obat.*.jumlah.required' => 'Jumlah obat wajib diisi.',
            'obat.*.jumlah.integer' => 'Jumlah obat harus berupa angka.',
            'obat.*.jumlah.min' => 'Jumlah obat minimal adalah 1.',
        ];
    }
}
