<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid', 'firstname', 'lastname', 'name', 'username', 'email', 'phone', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function login($request)
    {
        $uid = $request->uid;
        $password = $request->password;

        $remember = $request->remember;

        return (Auth::attempt(['uid' => $uid, 'password' => $password], $remember));
    }
}
