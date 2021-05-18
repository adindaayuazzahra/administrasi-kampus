<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;

class LoginController extends Controller
{
    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email','password'))) {
            
            return redirect('/dashboard');
        }
        return redirect('login');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function register()
    {
        return view('users/register');
    }

    public function postregis(Request $request)
    {
        User::create([
            'name'=> $request->name,
            'level'=> 'User',
            'address'=> $request->address,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

        return redirect('/login')->with('status', 'Berhasil membuat akun, silahkan Login!');
    }
}
