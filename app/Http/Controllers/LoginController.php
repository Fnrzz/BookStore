<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login()
    {
        return view('Login.login');
    }

    public function register()
    {
        return view('Login.register');
    }

    public function store(Request $request)
    {
        $validatedata =  $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns',
            'username' => 'required|unique:users|max:6',
            'password' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $validatedata['password'] = bcrypt($validatedata['password']);

        User::create($validatedata);


        return redirect('/login')->with('success',"You Have Account Now,Please Login!");
    }

    public function authenticate(Request $request)
    {
        $validatedata = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($validatedata)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/')->with('success',"Successful Login,Enjoy Shopping! ");
        }

        return back()->with('error','Login Filed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/')->with('success',"Successful Logout!");
    }
}
