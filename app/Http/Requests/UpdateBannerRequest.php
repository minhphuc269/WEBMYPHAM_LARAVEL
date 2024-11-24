<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
           'name'=>'required',
           'image'=>'required',
           'link'=>'required',
           'position'=>'required',
        ];
    }
    public function messages() : array
    {
        return [
            'name.required'=>'Tên banner không được để trống!',
            'image.required'=>'Hình không được để trống!',
            'link.required'=>'Liên kết không được để trống!',
            'position.required'=>'Vị trí không được để trống!',
        ];
    }

}

