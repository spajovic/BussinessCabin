<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'createPostHeading' => 'bail|required|max:64|min:2',
            'createPostContent' => 'bail|required|string',
            'createPostCategory' => 'bail|required',
        ];
    }
}
