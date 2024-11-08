<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdate extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'sometimes|nullable|string|min:6|max:20',
            'phone2' => 'sometimes|nullable|string|min:6|max:20',
            'email' => 'sometimes|nullable|email|max:100|unique:users,id',
            'username' => 'sometimes|nullable|alpha_dash|min:8|max:100|unique:users',
            'photo' => 'sometimes|nullable|image|mimes:jpeg,gif,png,jpg|max:2048',
            'address' => 'required|string|min:6|max:120',
            'municipio_id' => 'required',
            'curp' => 'required|regex:/^[A-Z]{4}[0-9]{6}[A-Z]{7}[0-9]{1}$/|size:18',
            'rfc' => 'required|regex:/^[A-Z]{4}[0-9]{6}[A-Z]{3}$/|size:13'
        ];
    }

    public function attributes()
    {
        return  [
            'nal_id' => 'Nationality',
            'state_id' => 'State',
            'municipio_id' => 'Municipio',
            'phone2' => 'Telephone',
        ];
    }
}
