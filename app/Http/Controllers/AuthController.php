<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends ResponseController
{
    /**
     * Constructor
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Access to login form
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function loginForm()
    {
        return view('login');
    }

    /**
     * Login Process
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse redirect
     */
    public function login(Request $request)
    {
        if (User::login($request)) {
            return redirect()->to('/');
        } else {
            flash()->error("Invalid Login Credentials");
            return redirect()->back();
        }

        return redirect()->back()->withInput($request->all);
    }

    /**
     * Logout Process
     *
     * @return \Illuminate\Http\RedirectResponse redirect
     */
    public function logOut()
    {
        Auth::logout();

        return redirect()->to('/login');
    }

    /**
     * Register User
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse redirect
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), User::$validation_rule);

        if ($validator->fails()) {
            flash()->error($this->validationErrorsToString($validator->errors()));
            return redirect()->back();
        }

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        flash()->success("User Registered");

        Auth::login($user);

        return redirect()->to('/');
    }

    /**
     * User ID Unique Check
     *
     * @param string $uid
     * @return boolean
     */
    public function idcheck(Request $request)
    {
        $user = User::where('uid', $request->get('uid'))->first();
        return $user ? json_encode(false) : json_encode(true);
    }
}
