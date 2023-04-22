<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegist extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public static function rules(): array
    {
        return [
            //ユーザー名は必須、5字以上、40字まで、アルファベット、数字の組み合わせ
            'user'=>'required | min:5 | max:40 | alpha_num',
            //パスワードは必須、5字以上、40字まで、アルファベット、数字の組み合わせ
            'password'=>'required | min:5 | max:40 | alpha_num'
        ];
    }

    public function messages()
    {
        return [
            'user.required' => 'ユーザーIDが未入力です',
            'user.min:5' => 'ユーザーIDは5文字以上です',
            'user.max:40' => 'ユーザーIDは40文字以下です',
            'user.alpha_num' => 'ユーザーIDはアルファベットと数字のみを使用してください',
            'password.required' => 'パスワードが未入力です',
            'password.min:5' => 'パスワードは5文字以上です',
            'password.max:40' => 'パスワードは40文字以内です',
            'password.alpha_num' => 'パスワードはアルファベットと数字のみを使用してください'
        ];
    }
}
