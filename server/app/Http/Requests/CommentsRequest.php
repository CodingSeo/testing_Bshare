<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class CommentsRequest extends ApiRequest
{
    public function authorize()
    {
        return false;
    }
    
    public function rules()
    {
        return [
            'title'=>['required','max:255'],
            'files'=>['array'],
            'files.*'=>['mimes::jpg,png,png,zip,tar','max:30000'], 
        ];
    }
    public function message(){
        return[
            'required'=>':arribute should be required.',
            'min'=>':arribute should be longer.',
            'max'=>':arribute should be shorter.'
        ];
    }
    public function attributes(){
        return[
            'title'=>'title'
        ];
    }
}
