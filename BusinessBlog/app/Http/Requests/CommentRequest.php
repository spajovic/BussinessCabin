<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{

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
            'commentText' => 'bail|required|string|max:450'
        ];
    }
    public function messages()
    {
        return[
            'commentText.required' => 'Comment field is required',
            'commentText.string' => 'Comment field must be a text',
            'commentText.max' => 'Comment must can be 450 char long'
        ];
    }
}
