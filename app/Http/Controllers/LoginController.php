<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
       $credentials=$request->validate([
        'email'=>'required|email:dns',
        'password'=>'required'
       ]);
       
       if(Auth::attempt($credentials))
       {
        $user=auth()->user();
            $request->session()->regenerate();
            if(Auth::user()->level == 1){
                return redirect()->route('admin',['userId' => $user->id]);
            }else{
                return redirect()->route('dashboard',['userId' => $user->id]);
            }
       }else{
        return back()->withErrors($credentials);
       }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
