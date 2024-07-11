<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PoliEditRequest extends FormRequest
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
            'id' => 'required|exists:polis,id',
            'nama' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'ID tidak ditemukan.',
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 255 karakter.',
        ];
    }
}
