<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('Authentications.register');
    }
    public function handleRegister(Request $request){
        $request->validate([
        'name'=>'required | string | max:100',
        'email'=>'required | email | max:100',
        'password'=>'required | string | max:50 | min:5'
        ]);

        $user = User::create([
            'name'=> $request->name ,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ]);
        Auth::login($user);
        return redirect(route('books.index'));
    }
    public function login(){
        return view('Authentications.login');
    }
    public function handleLogin(Request $request){
        $request->validate([
        'email'=>'required | email | max:100',
        'password'=>'required | string | max:50 | min:5'
        ]);

       $is_login = Auth::attempt([
        'email'=>$request->email,'password'=>$request->password
    ]);
       if(! $is_login){
        return back();
       }
       else
       return redirect(route('books.index'));
    }
    public function logout(){
        Auth::logout();
        return view('Authentications.login');
    }
}
