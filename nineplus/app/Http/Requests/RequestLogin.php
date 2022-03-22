<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestLogin extends FormRequest
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
        return [
            'email'=>'required|email',
            'password'=>'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
            
        ];
    }


    public function messages()
    {
        return [
           
            'email.required' => 'email is required',
            'email.email' => 'email sai dinh dang',
            'password.required' => 'password is required',
            'password.min' => 'password min 8',
            'password.regex'=>'password khong dung dinh dang',
            
        ];
    }
}
