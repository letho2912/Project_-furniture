<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'message'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên không được bỏ trống',
            'email.required'=>'Email không được bỏ trống',
            'phone.required'=>'Số điện thoại không được trống',
            'message.required'=>'Lời nhắn không được trống'

        ];
    }
}
