<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'required',
            'password' => 'required'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Chưa nhập tên tài khoản',
            'password.required' => 'Chưa nhập mật khẩu'
        ];
    }
}
