<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        $data['title'] = '';
        return view('login', $data);
    }

    public function authenticate(Request $request){
        $request->validate([
            'email'=>'required|email:dns',
            'password'=>'required'
        ]);

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('loginError', 'Login Failed');
    }
}
