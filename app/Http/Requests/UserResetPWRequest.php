<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserResetPWRequest extends FormRequest
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
            'tanggal_lahir' => 'required|date|date_format:Y-m-d',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'ID tidak ditemukan.',
            'id.exists' => 'ID tidak ditemukan di dalam database.',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'tanggal_lahir.date_format' => 'Tanggal lahir harus dalam format YYYY-MM-DD.',
        ];
    }
}
