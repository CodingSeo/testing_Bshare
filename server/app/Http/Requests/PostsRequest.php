<?php

namespace App\Http\Requests;
use App\Http\Requests\ApiRequest;
class PostsRequest extends ApiRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required','max:255'],
            'body' => ['required'],
            'category_id' =>['required','exists:categories,id'],
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute is required',
            'max'  => ':attribute should be shorter',
            'exists' =>':attribute does not exist'
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'title',
            'body'  => 'body',
            'category_id'=>'category_id',
        ];
    }
    

}
