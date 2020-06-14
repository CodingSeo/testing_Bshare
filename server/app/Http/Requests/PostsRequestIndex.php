<?php

namespace App\Http\Requests;

<<<<<<< HEAD:server/app/Http/Requests/TestRequest.php
use App\Http\Requests\ApiRequest;

class TestRequest extends ApiRequest
=======
class PostsRequestIndex extends ApiRequest
>>>>>>> b80632a8d1fc9b8248cea6a22fe9121db9acbdb2:server/app/Http/Requests/PostsRequestIndex.php
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // 'post_id' => ['required','numeric'],
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
