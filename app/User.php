<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
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

    /**
     * Validation Rule for Registering.
     *
     * @var array
     */
    public static $validation_rule = [
        'uid'       => 'required|string|max:255|unique:users,uid,',
        'firstname' => 'required|string|max:50',
        'lastname'  => 'required|string|max:50',
        'name'      => 'required|string|max:100',
        'username'  => 'required|string|max:100',
        'email'     => 'required|email|max:255',
        'phone'     => 'required|numeric|digits_between:1,20',
        'password'  => 'required|max:255'
    ];

    /**
     * Get the jobs for the user.
     */
    public function jobs()
    {
        return $this->hasMany('App\Job');
    }

    /**
     * Authntication
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    public static function login(Request $request)
    {
        $uid = $request->uid;
        $password = $request->password;

        $remember = $request->remember;

        return (Auth::attempt(['uid' => $uid, 'password' => $password], $remember));
    }
}
