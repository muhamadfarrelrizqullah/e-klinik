<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeritaTambahRequest extends FormRequest
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
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:500',
            'isi' => 'required|string',
            'cover' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'judul.required' => 'Judul wajib diisi.',
            'judul.string' => 'Judul harus berupa teks.',
            'judul.max' => 'Judul tidak boleh lebih dari 255 karakter.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
            'deskripsi.max' => 'Deskripsi tidak boleh lebih dari 500 karakter.',
            'isi.required' => 'Isi wajib diisi.',
            'isi.string' => 'Isi harus berupa teks.',
            'cover.required' => 'Cover wajib diupload.',
            'cover.file' => 'Cover harus berupa file.',
            'cover.mimes' => 'Cover harus berformat jpeg, png, jpg, atau gif.',
            'cover.max' => 'Cover tidak boleh lebih dari 2MB.',
        ];
    }
}
