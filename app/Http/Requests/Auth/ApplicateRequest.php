<?php
namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class ApplicateRequest extends Request
{

    public function __construct()
    {
        parent::__construct();
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email|unique:application_tokens,email|max:255'
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'メールアドレス'
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'このEメールアドレスは既に使用されているか、既に申し込み済みです。'
        ];
    }
}
