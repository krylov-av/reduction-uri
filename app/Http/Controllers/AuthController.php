<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function attempt(Request $request)
    {
        //dd($request->remember);
        $credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        $remember = $request->remember==='on';

        if (!Auth::attempt($credentials,$remember))
        {
            return redirect()->back()->withErrors([
                'fail'=>'Username or password is incorrect'
            ]);
        }
        return redirect()->route('links.index')->with(['Success'=>'You logged in successfully']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('Home');
    }
}
