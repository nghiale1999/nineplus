<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'passwordcf' => 'required|same:password|min:8'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name is required',
            'email.required' => 'email is required',
            'email.email' => 'email sai dinh dang',
            'password.required' => 'password is required',
            'password.min' => 'password min 8',
            'passwordcf.required' => 'password confirm is required',
            'passwordcf.same' => 'password confirm khong khop',
            'passwordcf.min' => 'password confirm min 8',
        ];
    }

}
