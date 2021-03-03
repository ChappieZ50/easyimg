<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserAvatarRequest;
use App\Http\Requests\User\UserPasswordRequest;
use App\Http\Requests\User\UserRequest;
use App\Models\File as FileModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        return view('user.profile')->with('user', $user);
    }

    public function userImages()
    {
        $files = FileModel::where('user_id', auth()->user()->id)->orderByDesc('id')->paginate();
        return view('user.files')->with('files', $files);
    }

    public function destroyFile($id)
    {
        $file = FileModel::where('id', $id)->where('user_id', Auth::user()->id)->first();
        if ($file) {
            return response()->json(['name' => $file->file_original_id]);
        }

        return response()->json([], 404);
    }

    public function update(UserRequest $request)
    {
        $update = Auth::user()->update($request->validated());

        if ($update) {
            return response()->json(['status' => true]);
        }

        return response()->json([], 500);
    }

    public function updatePassword(UserPasswordRequest $request)
    {
        $password = Hash::make($request->get('password'));

        $update = Auth::user()->update([
            'password' => $password
        ]);

        if ($update) {
            return response()->json(['status' => true]);
        }

        return response()->json([], 500);
    }


    public function updateAvatar(UserAvatarRequest $request)
    {
        $user = Auth::user();

        $avatar = upload_file($request->file('avatar'), config('imgfoo.user_avatars_folder'), $user->avatar)->getData();
        if ($avatar) {
            $update = $user->update([
                'avatar' => $avatar->name
            ]);
            if ($update) {
                return response()->json(['status' => true]);
            }
        }

        return response()->json([], 500);

    }

}
