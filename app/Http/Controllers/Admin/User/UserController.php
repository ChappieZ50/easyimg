<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request){
        $users = User::orderByDesc('id');
        if($request->has('s')){
            $s = $request->get('s');
            $users->where('username','like','%'.$s.'%')->orWhere('email','like','%'.$s.'%');
        }
        return view('irob.users.users')->with('users',$users->paginate());
    }
    public function status(Request $request){
        $user = User::where('id','!=',Auth::user()->id)->find($request->get('user'));
        $update = false;
        if($user){
            $update = $user->update([
                'status' => $request->get('status') ? true : false
            ]);
        }
       

        return response()->json([
            'status' => $update ? true : false
        ]);
    }
}
