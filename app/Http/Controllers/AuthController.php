<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if (User::login($request)) {
            return redirect()->to('/');
        }

        return redirect()->back()->withInput($request->all);
    }

    public function logOut()
    {
        Auth::logout();

        return redirect()->to('/login');
    }
}
