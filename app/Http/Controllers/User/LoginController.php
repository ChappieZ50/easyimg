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

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
