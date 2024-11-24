<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'title' => 'required',
            'detail' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Tên bài viết được để trống.',
            'detail.required' => 'Chi tiết bài viết được để trống.',
        ];
    }
}

