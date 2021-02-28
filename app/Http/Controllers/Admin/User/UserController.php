<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderByDesc('id');
        if ($request->has('s')) {
            $s = $request->get('s');
            $users->where('username', 'like', '%' . $s . '%')->orWhere('email', 'like', '%' . $s . '%');
        }
        return view('irob.users.users')->with('users', $users->paginate());
    }

    public function show($id, Request $request)
    {
        $files = File::orderByDesc('id');
        if ($request->has('s')) {
            $s = $request->get('s');
            $files->where('file_id', 'like', '%' . $s . '%')->orWhere('file_original_id', 'like', '%' . $s . '%');
        }
        $files->where('user_id',$id);

        $user = User::findOrFail($id);

        return view('irob.users.user')->with([
            'user' => $user,
            'files' => $files->paginate()
        ]);
    }

    public function store(UserRequest $request)
    {
        $user = new User([
            'username' => $request->get('username'),
            'email'    => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'is_admin' => $request->get('is_admin') ? true : false,
        ]);
        if ($user->save()) {
            return response()->json([
                'status'  => true,
                'message' => 'User Created',
            ]);
        } else {
            return response()->json([
                'status'  => false,
                'message' => 'Something wrong please try again.'
            ], 500);
        }
    }

    /* Ajax Call */
    public function status(Request $request)
    {
        $user = User::where('id', '!=', Auth::user()->id)->find($request->get('user'));
        $update = false;
        if ($user) {
            $update = $user->update([
                'status' => $request->get('status') ? true : false
            ]);
        }


        return response()->json([
            'status' => $update ? true : false
        ]);
    }
}
