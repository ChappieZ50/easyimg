<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login')->with('no_header',true);
    }
    public function store(LoginRequest $request){
        $credentials = [
            'email'    => $request->get('email'),
            'password' => $request->get('password') 
        ];

        if(Auth::attempt($credentials)){
            if(!Auth::user()->status && !Auth::user()->is_admin){
                Auth::logout();
                return back()->withErrors([
                    'non' => 'Your accont has been banned',
                ]);
            }

            if(Auth::user()->is_admin){ 
                return redirect()->route('admin.home');
            }
            return redirect()->route('user.profile');
        }

        return back()->withErrors([
            'non' => 'Email or password is incorrect.',
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
