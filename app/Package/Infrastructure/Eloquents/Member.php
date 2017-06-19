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
        'address',
        'tel',
        'fax',
        'company',
        'division',
        'post',
        'email',
        'password',
        'is_active',
        'refuse',
        'remember_token'
    ];
}
