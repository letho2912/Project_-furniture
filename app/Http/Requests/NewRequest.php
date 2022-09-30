<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'title' => 'required',
            'image' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => "Tiêu đề không được để trống",
            'image.required' => "Hình ảnh không được bỏ trống"
        ];
    }
}
