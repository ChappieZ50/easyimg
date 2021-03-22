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
        return view('ipool.users.users')->with('users', $users->paginate());
    }

    public function show($id, Request $request)
    {
        $s = $request->get('s');
        $files = File::orderByDesc('id')->where('user_id', $id)->where(function ($q) use ($s) {
            if ($s) {
                $q->where('file_id', 'like', '%' . $s . '%')->orWhere('file_original_id', 'like', '%' . $s . '%');
            }
        })->paginate();

        $user = User::findOrFail($id);

        return view('ipool.users.user')->with([
            'user'  => $user,
            'files' => $files
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
                'message' => __('page.admin_response_user_success'),
            ]);
        } else {
            return response()->json([
                'status'  => false,
                'message' => __('page.response_error')
            ], 500);
        }
    }

    /* Ajax Call */
    public function status(Request $request)
    {
        $user = User::where('id', '!=', Auth::user()->id)->find($request->get('user'));
        $update = false;
        if ($user) {
            if ($user->is_admin) {
                return response()->json([
                    'status'  => false,
                    'message' => __('page.admin_response_user_admin_ban_error'),
                ]);
            }

            $update = $user->update([
                'status' => $request->get('status') ? true : false
            ]);
        }


        if ($update) {
            return response()->json([
                'status'  => true,
                'message' => $request->get('status') ? __('page.admin_response_user_unban') : __('page.admin_response_user_ban')
            ]);
        } else {
            return response()->json([
                'status'  => false,
                'message' => __('page.response_error')
            ]);
        }
    }
}
