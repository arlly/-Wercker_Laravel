<?php
namespace App\Http\Requests\Auth;

use App\Http\Requests\User\UserRequest;

class RegisterRequest extends UserRequest
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
            'last_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'last_name_kana' => 'required|zenkaku_kana|max:255',
            'first_name_kana' => 'required|zenkaku_kana|max:255',
            
            'zip_code' => 'numeric|digits:7',
            'pref_code' => 'numeric|digits_between:1,2',
            'address1' => 'max:1000',
            'address2' => 'max:1000',
            
            'birth_y' => 'numeric|digits_between:1,4',
            'birth_m' => 'numeric|digits_between:1,2',
            'birth_d' => 'numeric|digits_between:1,2',
            
            'sub_email1' => 'email|different:sub_email2|max:255',
            'sub_email2' => 'email|different:sub_email1|max:255',
            'tel' => 'numeric|digits_between:1,20',
            'fax' => 'numeric|digits_between:1,20',
            
            'password' => 'required|min:8|max:16|confirmed',
            'password_confirmation' => 'required_with:password',
            'remarks' => 'max:1000',
            
            'account_type' => 'numeric|digits:1',
            
            'yucho_symbol' => 'required_if:account_type,1|max:255',
            'yucho_number' => 'required_if:account_type,1|max:255',
            'yucho_name' => 'required_if:account_type,1|max:255',
            
            'bank_name' => 'required_if:account_type,2|max:255',
            'bank_branch_name' => 'required_if:account_type,2|max:255',
            'bank_account_type' => 'required_if:account_type,2|numeric|digits:1',
            'bank_account_number' => 'required_if:account_type,2|numeric|digits:7',
            'bank_account_name' => 'required_if:account_type,2|zenkaku_kana|max:255',
            
            'agreement' => 'required|true'
        ];
    }
}
