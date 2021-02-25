<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\File;
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
        $files = File::where('user_id',auth()->user()->id)->orderByDesc('id')->paginate();
        return view('user.files')->with('files',$files);
    }
}
