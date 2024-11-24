<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'price' => 'required',
            'qty' => 'required',
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
    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->price && $this->pricesale && $this->pricesale >= $this->price) {
                $validator->errors()->add('pricesale', 'Giá khuyến mãi phải nhỏ hơn giá sản phẩm.');
            }
        });
    }
}
