<?php
namespace App\package\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $fillable = [
        'name',
        'zip',
        'pref',
        'address1',
        'address2',
        'tel1',
        'tel2',
        'tel3',
        'fax1',
        'fax2',
        'fax3',
        'company',
        'division',
        'post',
        'email',
        'password',
        'is_active',
        'remember_token'
    ];
}
