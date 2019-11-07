<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;    //特にアクセス権限などを求めないリクエストであればtrueを返すように書く
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'name' => ['required', 'string', 'max:255'],
             'kname' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'password' => ['required', 'string', 'min:8', 'confirmed'],
             'gender' => 'required',
             'birthday1' => ['required', 'string',],
             'birthday2' => ['required', 'string',],
             'birthday3' => ['required', 'string',],
             'tel' => ['required', 'string'],
             'postal_code' => 'required',
             'prefectures_name' => ['required', 'string', 'max:255'],
             'city' => ['required', 'string', 'max:255'],
             'subsequent_address' => ['required', 'string', 'max:255']
        ];
    }
    
    public function messages(){
        return [
            'name.required' => 'nameを入力してください。',
            'email.required' => 'emailを入力してください。',
            'email.confirmed' => '確認メールアドレスと一致しません。',
            'email_confirmation.required' => '確認用メールアドレスを入力してください。',
            'password.required' => 'passwordを入力してください。',
            'password.min' => 'passwordは8字以上でお願いします。',
            'password.confirmed' => '確認passwordと一致しません。',
            'password_confirmation.required' => '確認用passwordを入力してください。',
            'password_confirmation.min' => '確認用passwordも8字以上でお願いします。',
            'gender.required'  => '性別を選択してください',
            'birthday1.required'  => '生年月日を入力してください',
            'tel.required'  => '電話番号を入力してください',
            'postal_code.required' => '郵便番号を入力してください',
            'prefectures_name.required' => '都道府県を選択してください',
            'city.required' => '市区町村を入力してください',
            'subsequent_address' => 'それ以降の住所を入力してください',
        ];
    }
    
    
       
    
}
