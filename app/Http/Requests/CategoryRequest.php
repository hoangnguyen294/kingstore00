<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'unique:categories|required|min:3|max:30'
        ];
    }
    public function messages()
    {
        return [
            'name.unique'=>'Trùng tên danh mục !',
            'name.required'=>'Chưa nhập tên danh mục',
            'name.min'=>'Tên danh mục không được ngắn hơn 3 ký tự',
            'name.max'=>'Tên danh mục không được dài hơn 30 ký tự'
        ];
    }
}
