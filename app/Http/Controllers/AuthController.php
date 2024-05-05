<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerPage(){
        return view('register');
    }

    public function register(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'number' => 'required'
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($r($name, $parameters = [], $absolute = true)),
            'email' => $request->email,
            'number' => $request->number,
        ]);

        return redirect(route('homePage'));
    }

    public function loginPage(){
        return view('login');
    }

    public function login(Request $request){
        $credentials= $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'number' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $request->session()->put('username', $request->username);

            return redirect(route('homePage'));
        }

        return back()->withErrors([
            'username' => 'Invalid Credentials'
        ])->onlyInput('username');
    }

    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('homepage'));
    }

}
