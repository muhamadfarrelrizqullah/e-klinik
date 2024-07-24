<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PemeriksaanUpdateStatusRequest extends FormRequest
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
            'catatan' => 'nullable|string|max:255',
            'surat_perizinan_file' => 'nullable|file|mimes:pdf|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'catatan.string' => 'Catatan harus berupa teks.',
            'catatan.max' => 'Catatan maksimal 255 karakter.',
            'surat_perizinan_file.file' => 'File harus berupa dokumen.',
            'surat_perizinan_file.mimes' => 'File harus berekstensi PDF.',
            'surat_perizinan_file.max' => 'Ukuran file maksimum 5 MB.',
        ];
    }
}
