<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function store(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/employee');
        }

        return back()->with('err', 'The provided credentials do not match our records.');
    }

    // public function store(Request $request){
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|string|max:255',
    //         'password' => 'required|string|min:8|confirmed'
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     $user =new User();
    //     $user =email = $request->input('email');
    //     $user =password = $request->input('password')
    // }
}
