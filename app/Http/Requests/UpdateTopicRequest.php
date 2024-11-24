<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTopicRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
           'name'=>'required'
        ];
    }
    public function messages() : array
    {
        return [
            'name.required'=>'Tên chủ đề không được để trống!'
        ];
    }

}

