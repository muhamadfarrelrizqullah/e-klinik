<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use App\Models\JadwalDokter; // Import model JadwalDokter
use Illuminate\Support\Facades\Auth;

class JadwalEditRequest extends FormRequest
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
            'hari' => 'required|string|max:255',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai', 
        ];
    }

    public function messages()
    {
        return [
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
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $userId = Auth::id();
            $hari = $this->hari;
            $jadwalId = $this->route('jadwal');

            // Cek apakah dokter sudah memiliki jadwal di hari yang sama selain jadwal yang sedang diedit
            $existingJadwal = JadwalDokter::where('id_dokter', $userId)
                ->where('hari', $hari)
                ->where('id', '!=', $jadwalId) 
                ->exists();

            if ($existingJadwal) {
                $validator->errors()->add('hari', 'Dokter sudah memiliki jadwal pada hari tersebut.');
            }
        });
    }
}
