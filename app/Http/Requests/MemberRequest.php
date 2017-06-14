<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            //
            'name' => 'required|max:50',
            'zip' => 'required|max:50',
            'pref' => 'required|numeric|max:50',
            'address1' => 'max:200',
            'address2' => 'max:200',
            'tel1' => 'numeric',
            'tel2' => 'numeric',
            'tel3' => 'numeric',
            'fax1' => 'numeric',
            'fax2' => 'numeric',
            'fax3' => 'numeric',
            'email' => 'required|email',
            'is_active' => 'required|numeric|max:5'
        ];
    }
    
    public function attributes()
    {
        return [
            'name' => 'お名前',
            'zip' => '郵便番号',
            'pref' => '都道府県',
            'address1' => '住所1',
            'address2' => '住所2',
            'tel1' => '電話番号1',
            'tel2' => '電話番号2',
            'tel3' => '電話番号3',
            'fax1' => 'fax1',
            'fax2' => 'fax2',
            'fax3' => 'fax3',
            'email' => 'メールアドレス',
            'is_active' => 'アクティブステータス'
            
            
        ];
        
        
    }
}
