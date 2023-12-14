<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAddUser extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return
        [
            'name'=>'required',
            'mobile'=>'required|regex:/^(01)[0-9]{9}$/|unique:users',
            'payment_day'=>'required|numeric|between:1,30',
            'password'=>'required|min:3|max:16',
            function ($password, $value, $fail) {
                $this->merge([$password => bcrypt($value)]);
            },
        ];
    }

    public function messages()
    {
        return
        [
        'mobile.regex'=>'Mobile format is invalid. Ex: 010XXXXXXXX'
        ];
    }

}
