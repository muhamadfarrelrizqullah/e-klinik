<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Set ke true jika ingin memungkinkan request untuk diproses
    }

    public function rules()
    {
        return [
            'nip' => 'required|digits:8',
            'password' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'nip.required' => 'Nip wajib diisi',
            'nip.digits' => 'Nip harus 8 digit',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal harus 8 karakter',
        ];
    }
}
