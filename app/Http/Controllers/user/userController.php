<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function register()
    {

        return view('auth.registerUser');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
//            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
//            'gender' => 'required|string|max:255',
//            'phone' => 'required|string|max:11',
//            'idNumber' => 'required|string|max:14',
//            'city' => 'required|string|max:20',
//            'birthday' =>'required|string|max:20',
//            'password' => 'required|string|min:8|confirmed',
//            'password_confirmation' => 'required',
        ]);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'birthday' =>$request->birthday,
            'password' => Hash::make($request->password),
        ]);
        return redirect('home');

    }
    public function login()
    {

        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }

        return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
    }


    public function logout() {
        Auth::logout();

        return redirect('login');
    }
    public function home()
    {
        return view('home');
    }

}
