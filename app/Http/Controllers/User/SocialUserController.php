<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialUserController extends Controller
{
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleLogin()
    {
        $googleUser = Socialite::driver('google')->user();

        if ($googleUser) {
            $user = User::where('google', $googleUser->id)->first();
            if ($user) {
                if (!$user->status) {
                    return redirect()->route('user.login.index')->withErrors([
                        'non' => 'Your accont has been banned',
                    ]);
                }
                Auth::login($user);
                return redirect()->route('home');
            }

            $find = User::where('email', $googleUser->email)->first();

            if ($find) {
                return redirect()->route('user.login.index')->withErrors([
                    'non' => 'User already exists. Sign in with email password.'
                ]);
            }

            $user = User::create([
                'username' => $googleUser->name,
                'email'    => $googleUser->email,
                'google'   => $googleUser->id,
                'password' => bcrypt($googleUser->token),
            ]);
            Auth::login($user);

            return redirect()->route('home');
        }

        return abort(404);
    }

    public function facebookLogin()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookLogin()
    {
        $facebookUser = Socialite::driver('facebook')->user();

        dd($facebookUser);
        if ($facebookUser) {
            $user = User::where('facebook', $facebookUser->id)->first();
            if ($user) {
                if (!$user->status) {
                    return redirect()->route('user.login.index')->withErrors([
                        'non' => 'Your accont has been banned',
                    ]);
                }
                Auth::login($user);
                return redirect()->route('home');
            }

            $find = User::where('email', $facebookUser->email)->first();

            if ($find) {
                return redirect()->route('user.login.index')->withErrors([
                    'non' => 'User already exists. Sign in with email password.'
                ]);
            }

            $user = User::create([
                'username' => $facebookUser->name,
                'email'    => $facebookUser->email,
                'facebook' => $facebookUser->id,
                'password' => bcrypt($facebookUser->token),
            ]);
            Auth::login($user);

            return redirect()->route('home');
        }

        return abort(404);
    }
}
