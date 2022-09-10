<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreOrUpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'username' => 'required|numeric',
        ];

        if($this->isMethod('POST')){
            $rules['password'] = 'required|min:6';
            $rules['confirmation_password'] = 'required|same:password';
            $rules['username'] .= '|unique:users,id,'.$this->user()->id;
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'username.required' => 'Kolom nidn / kode prodi harus diisi.',
            'usename.numeric' => 'Kolom nidn / kode prodi harus diisi angka',
            'email.required' => 'Kolom email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Kolom password harus diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'role.required' => 'Kolom role harus diisi.',
            'role.in' => 'Role tidak valid.',
            'avatar.image' => 'File harus berupa gambar.',
            'avatar.mimes' => 'Format gambar tidak valid.',
            'avatar.max' => 'Gambar tidak boleh lebih dari 2MB.',
            'confirmation_password.required' => 'Kolom konfirmasi password harus diisi.',
            'confirmation_password.same' => 'Konfirmasi password tidak sama.',
        ];
    }
}
