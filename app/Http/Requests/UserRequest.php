<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required',
            'password' => 'required'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Chưa nhập tên tài khoản!',
            'email.required' => 'Chưa nhập email!',
            'password.required' => 'Chưa nhập mật khẩu!'
        ];
    }
}
