<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'login-email' => 'bail|required|string|email|',
            'login-passwd'=> 'bail|required|min:8|max:16',
        ];
    }
    public function messages()
    {
        return[
            'login-email.required'=>'Email field is required',
            'login-email.email'=>'Invalid email format',
            'login-passwd.required'=>'Password filed is required',
            'login-passwd.min'=>'Password must contain at least 8char',
            'login-passwd.max'=>'Password can contain max 16char',
        ];
    }
}
