<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {

        return view('auth.register');
    }
    public function register2(){
        return view('auth.register2');

    }


    public function storeUser1(Request $request)
    {
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users',
//            'gender' => 'required|string|max:255',
//            'phone' => 'required|string|max:11',
//            'idNumber' => 'required|string|max:14',
//            'city' => 'required|string|max:20',
//            'birthday' =>'required|string|max:20',
//            'password' => 'required|string|min:8|confirmed',
//            'password_confirmation' => 'required',
//        ]);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'idnumber' =>$request->idNumber,
            'city'=> $request->city,
            'birthday' =>$request->birthday,
            'password' => Hash::make($request->password),

        ]);

        return redirect('register2');
    }

    public function storeUser2(Request $request)
    {
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users',
//            'gender' => 'required|string|max:255',
//            'phone' => 'required|string|max:11',
//            'idNumber' => 'required|string|max:14',
//            'city' => 'required|string|max:20',
//            'birthday' =>'required|string|max:20',
//            'password' => 'required|string|min:8|confirmed',
//            'password_confirmation' => 'required',
//        ]);
        $file_extension1 = $request ->idimage -> getClientOriginalExtension();
        $file_name1 = time().'.'.$file_extension1;
        $path1 = 'images/guide/id';
        $request -> idimage -> move($path1,$file_name1);

        $file_extension2 = $request ->cerimage -> getClientOriginalExtension();
        $file_name2 = time().'.'.$file_extension2;
        $path2 = 'images/guide/cer';
        $request -> cerimage -> move($path2,$file_name2);

        User::create([

            'idimage' => $request ->$file_name1,
            'cerimage' => $request->$file_name2,

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
