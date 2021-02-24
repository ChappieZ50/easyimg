<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        return view('user.profile')->with('user',$user);
    }

    public function userImages()
    {
        return view('user.images');
    }
}
