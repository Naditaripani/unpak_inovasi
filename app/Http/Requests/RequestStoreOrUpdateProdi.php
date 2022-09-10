<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreOrUpdateProdi extends FormRequest
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
        $rules =  [
            'kode_prodi' => 'required|numeric|unique:prodis,id,'.$this->id,
        ];

        if($this->isMethod('POST')){
            $rules['password'] = 'required|min:6';
            $rules['confirmation_password'] = 'required|same:password';
        }

        return $rules;
    }
}
