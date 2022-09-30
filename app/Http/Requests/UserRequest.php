<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'password' => 'min:8|confirmed',
            'phone' => 'required|regex:/(03)[0-9]{8}/'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => "Email không được bỏ trống",
            'email.email' => "Email không đúng định dạng",
            'email.unique' => "Email đã tồn tại",
            'password.min' => "Mật khẩu không được bỏ trống",
            'password.min' => "Mật khẩu phải chứa ít nhất 8 kí tự",
            'password.confirmed' => "Xác nhận mật khẩu không đúng",
            'phone.required' => "Số điện thoại không được bỏ trống",
            'phone.regex' => "Số điện thoại không đúng"
        ];
    }
}
