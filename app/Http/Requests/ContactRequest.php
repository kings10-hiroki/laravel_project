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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2',
            'email' => 'required|email|',
            'subject' => 'required',
            'message' => 'required'
        ];
    }

    // エラーメッセージの内容を変更
    // public function messages()
    // {
    //     return [
    //         'name.required' => 'Name欄にあなたのお名前を入力してください'
    //     ];
    // }

    // バリデーションの属性を変更
    // public function attributes()
    // {
    //     return [
    //         'email' => 'Eメール'
    //     ];
    // }
}
