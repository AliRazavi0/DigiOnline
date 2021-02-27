<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    use TwoFactorAuth;

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(Request $request)
    {


        try {
            $googleUser = Socialite::driver('google')->user();


            $user = User::where('email', $googleUser->email)->first();
            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'mobile' => null,
                    'password' => bcrypt(Str::random(16))
                ]);
            }

            Auth::loginUsingId($user->id);

            return $this->loggind($request, $user) ?: redirect(route('/'));
        } catch (\Exception $exception) {
            alert()->error('مشکل در عملیات ورود با گوگل', 'پیغام خطا')->persistent('فهمیدم');
            return redirect(route('login'));
        }
    }
}
