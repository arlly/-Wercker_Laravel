<?php
namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class LoginRequest extends Request
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
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:16',
            'remember' => 'boolean'
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'password_confirmation' => 'パスワード(確認用)'
        ];
    }

    public function messages()
    {
        return [];
        //
        
    }
}
