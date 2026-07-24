<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginPage(){
        return view("authentification.loginPage");
    }
    public function login(Request $request){
            $request->validate([
                "email" => "required|email",
                "password" => "required"
            ]);
            $credentials = $request->only('email', 'password');
            if(Auth::attempt($credentials)){

                $request->session()->regenerate();

                $user = Auth::user();

                if($user->role->label == "admin"){
                    return to_route("dachbordAdmin");
                }

                if($user->role->label == "student"){
                   return to_route("displayEvent");
                }
            }
            else{
                return back()->withErrors([
                    "email"=>"email or password is incorrect"
                ]);
            }
    }
   public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('loginPageS');
    }

}
