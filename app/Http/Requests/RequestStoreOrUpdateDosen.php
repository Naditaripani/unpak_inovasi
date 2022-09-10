<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreOrUpdateDosen extends FormRequest
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
            'nidn' => 'required|numeric|unique:dosens,id,'.$this->id,
            'kode_prodi' => 'required|numeric|unique:dosens,id,'.$this->id,
        ];

        if($this->isMethod('POST')){
            $rules['password'] = 'required|min:6';
            $rules['confirmation_password'] = 'required|same:password';
        }

        return $rules;
    }
}
