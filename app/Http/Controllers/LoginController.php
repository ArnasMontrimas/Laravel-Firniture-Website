<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request) {
        $validator = $request -> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $userData = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        
        if(Auth::attempt($userData)) {
            return redirect()->route('home');
        }
        else {
            return back();
        }

    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return back();
    }

}
