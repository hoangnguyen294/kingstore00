<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'name' => 'required | min:5 | max:50',
            'image' =>'required | mimes:jpeg,jpg,png',
            'price' => 'required | integer | min:100000 | max:1000000000',
            'description' =>'required | min:10 | max:300'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Chưa nhập tên sản phẩm',
            'name.min' => 'Tên sản phẩm không được ít hơn 5 ký tự',
            'name.max' => 'Tên sản phẩm không được nhiều hơn 50 ký tự',
            'image.required' => 'Chưa chọn ảnh',
            'image.mimes' => 'Sai định dạng ảnh,xin hãy chọn đuôi (jpeg,jpg,png)',
            'price.required' => 'Chưa nhập giá sản phẩm',
            'price.integer' => 'Hãy nhập số nguyên',
            'price.min' => 'Giá sản phẩm quá thấp',
            'price.max' => 'Giá sản phẩm quá cao',
            'description.required' => 'Chưa nhập mô tả cho sản phẩm',
            'description.min' => 'Mô tả không được ngắn hơn 10 ký tự',
            'description.max' => 'Mô tả không được dài hơn 300 Ký tự'
        ];
    }
}
