<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestBaiviet extends FormRequest
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
            'tieude'=>'required',
            'hinh'=>'image|mimes:png,jpg,jpeg,gif|max:2048',
            
        ];
    }

    public function messages()
    {
        return [
            'tieude.required'=>'tiede hk dc trong',
            'hinh.required'=>'Mời bạn nhập hình ảnh',
            'hinh.mimes'=>'Ảnh đại điện bị lỗi',
            'hinh.max'=>'Dung lượng ảnh quá lớn'            
        ];
    }
}
