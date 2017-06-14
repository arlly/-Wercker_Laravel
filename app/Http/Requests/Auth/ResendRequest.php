<?php
namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class ResendRequest extends Request
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
            'email' => 'required|email|max:255'
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
        return [];
        //
        
    }
}
