<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('login')->with([
            'no_header' => true
        ]);
    }

    public function register()
    {
        return view('register')->with([
            'no_header' => true,
        ]);
    }
}
