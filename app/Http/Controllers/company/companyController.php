<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Auth;
use Illuminate\Http\Request;

class companyController extends Controller
{
    public function addCompany(){
        return view('auth.addCompany');

    }
    public function storeCompany(Request $request)
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

        $file_extension2 = $request ->logo -> getClientOriginalExtension();
        $file_name2 = time().'.'.$file_extension2;
        $path2 = 'images/company/logo';
        $request -> logo -> move($path2,$file_name2);

        Company::create([
            'name' => $request->name,
            'address' => $request -> address,
            'email' => $request -> email,
            'phone' => $request -> phone,
            'about' => $request -> about,
            'logo' => $file_name2,

        ]);

        return redirect('home');
    }
}
