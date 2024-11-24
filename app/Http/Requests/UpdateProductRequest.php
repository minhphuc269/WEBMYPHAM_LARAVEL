<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'image' => 'required',
            'price' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:0',
            'brand_id' => 'not_in:0',
            'category_id' => 'not_in:0',
            'detail' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống.',
            'image.required' => 'Hình không được để trống.',
            'price.required' => 'Giá sản phẩm không được để trống.',
            'brand_id.not_in' => 'Hãy chọn một thương hiệu hợp lệ.',
            'category_id.not_in' => 'Hãy chọn một danh mục hợp lệ.',
            'qty.required' => 'Số lượng sản phẩm không được để trống.',
            'detail.required' => 'Chi tiết sản phẩm không được để trống.',
          
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'price' => $this->input('price', 0),
        ]);
    }

    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->input('pricesale') >= $this->input('price')) {
                $validator->errors()->add('pricesale', 'Giá khuyến mãi phải nhỏ hơn giá sản phẩm.');
            }
        });
    }
}
