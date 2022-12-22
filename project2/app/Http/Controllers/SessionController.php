<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index() {  
        return view("sessions/login");
    }

    function login(Request  $request){
        // Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'please input valid email address',
            'password.required' => 'please input valid password'
        ]);

        $logininfo = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($logininfo)){
            return redirect('/main');
        }else{
            return redirect('sessions');
        }
    }
    
    function logout() {
        Auth::logout();
        return redirect('sessions');
    }

}
