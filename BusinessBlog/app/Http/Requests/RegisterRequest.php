<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'register-name' => 'bail|required|string|min:2|max:21',
            'register-surname' => 'bail|required|string|min:2|max:21',
            'register-email' => 'bail|required|string|email|',
            'register-passwd'=> 'bail|required|min:8|max:16',
            'register-passwd1'=> 'bail|required|min:8|max:16'
        ];
    }
    public function messages()
    {
        return [
            'register-name.required' => 'Name field is required',
            'register-name.string' => 'Name must contain only letters',
            'register-name.min'=>'Name must be at least 2 letters long',
            'register-name.max'=>'Name can include max 21 letters',
            'register-surname.required' => 'Surname field is required',
            'register-surname.string' => 'Surname must contain only letters',
            'register-surname.min'=>'Surname must be at least 2 letters long',
            'register-surname.max'=>'Surname can include max 21 letters',
            'register-email.required'=>'Email field is required',
            'register-email.email'=>'Invalid email format',
            'register-passwd.required'=>'Password filed is required',
            'register-passwd.min'=>'Password must contain at least 8char',
            'register-passwd.max'=>'Password can contain max 16char',
            'register-passwd1.required'=>'Password filed is required',
            'register-passwd1.min'=>'Password must contain at least 8char',
            'register-passwd1.max'=>'Password can contain max 16char'
        ];
    }
}
