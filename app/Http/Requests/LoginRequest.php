<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
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
