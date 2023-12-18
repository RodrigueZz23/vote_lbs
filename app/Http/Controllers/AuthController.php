<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,

        ];


       if (Auth::attempt($credetials)) {

        if (Auth::user()->id == 5) {
            return redirect('/listes')->with('success', 'Login Success');
        }
        return view('/home');
    } else {
        return back()->with('error', 'Error Email or Password');
    }



        #if (Auth::user()->id == 16) {
            #return redirect('/home16')->with('success', 'Login Success');
        #}
       # else {
            #return back()->with('error', 'Error Email or Password');
        #}


    }




    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return back()->with('success', 'Register successfully');

    }

    public function logout()
{
    Auth::logout();

    return redirect()->route('welcome');
}
public function welcome()
    {
        return view('welcome');

    }
}


