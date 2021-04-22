<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'updatePostHeading' => 'bail|required|max:64|min:2',
            'updatePostContent' => 'bail|required|string',
            'updatePostCategory' => 'bail|required',
        ];
    }
}
