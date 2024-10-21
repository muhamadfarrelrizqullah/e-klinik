<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use App\Models\JadwalDokter;
use Illuminate\Support\Facades\Auth;

class JadwalTambahAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Sesuaikan otorisasinya
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'id_dokter' => 'required|exists:users,id', 
            'hari' => 'required|string|max:255',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages()
    {
        return [
            'id_dokter.required' => 'Dokter harus dipilih.',
            'id_dokter.exists' => 'Dokter tidak ditemukan.',
            'hari.required' => 'Hari harus dipilih.',
            'hari.string' => 'Hari harus berupa teks.',
            'hari.max' => 'Hari maksimal 255 karakter.',
            'jam_mulai.required' => 'Jam mulai harus diisi.',
            'jam_mulai.date_format' => 'Jam mulai harus dalam format HH:MM.',
            'jam_selesai.required' => 'Jam selesai harus diisi.',
            'jam_selesai.date_format' => 'Jam selesai harus dalam format HH:MM.',
            'jam_selesai.after' => 'Jam selesai harus setelah jam mulai.',
        ];
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $dokterId = $this->id_dokter;
            $hari = $this->hari;

            // Cek apakah dokter sudah memiliki jadwal pada hari yang sama
            $existingJadwal = JadwalDokter::where('id_dokter', $dokterId)
                ->where('hari', $hari)
                ->exists();

            if ($existingJadwal) {
                $validator->errors()->add('hari', 'Dokter sudah memiliki jadwal pada hari tersebut.');
            }
        });
    }
}
