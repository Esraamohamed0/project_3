<?php

namespace App\Http\Controllers\giude;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class languageController extends Controller
{
    public function register2(){
        return view('auth.register2');

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

        $file_extension2 = $request ->cerimage -> getClientOriginalExtension();
        $file_name2 = time().'.'.$file_extension2;
        $path2 = 'images/guide/cer';
        $request -> cerimage -> move($path2,$file_name2);

        Language::create([
            'name' => $request->name,
            'cerimage' => $file_name2,

        ]);

        return redirect('home');
    }

}
