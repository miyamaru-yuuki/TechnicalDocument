<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryRequest extends FormRequest
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
            'cname'=>'required',
        ];
    }

    //カスタムメッセージを設定
    public function messages()
    {
        return [
            'cname.required'=>'カテゴリ名は必ず入力して下さい。',
        ];
    }
}
