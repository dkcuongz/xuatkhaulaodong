<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IntroduceCreateRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'image' =>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được để trống.',
            'description.required' => 'Nội dung không được để trống.',
            'image.required' => 'Ảnh không được để trống.',
            'image.image' => 'File phải là ảnh',
            'image.mimes' => 'Ảnh không đúng định dạng.',
            'image.max' => 'Ảnh không được quá 2048Mb.',
        ];
    }
}
