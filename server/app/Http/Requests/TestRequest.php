<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;
class TestRequest extends ApiRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'post_id' => ['required','numeric'],
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute is required',
            'max'  => ':attribute should be shorter',
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'title',
            'body'  => 'body',
        ];
    }
}
