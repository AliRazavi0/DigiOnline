<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {


        try {
            $googleUser = Socialite::driver('google')->user();


            $user = User::where('email', $googleUser->email)->first();

            if ($user) {
                auth()->loginUsingId($user->id);

            } else {
                $newUser = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'mobile' => null,
                    'password' => bcrypt(Str::random(16))
                ]);

                auth()->loginUsingId($newUser->id);
            }

            return redirect(route('home'));
        } catch (\Exception $exception) {
            alert()->error('مشکل در عملیات ورود با گوگل','پیغام خطا')->persistent('فهمیدم');
            return  redirect(route('login'));
        }
    }
}
