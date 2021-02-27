<?php


namespace App\Http\Controllers\Auth;


use App\Code;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait TwoFactorAuth
{
    public function loggind(Request $request, User $user)
    {
        if ($user->hasEnableTowFactorAuth()) {
            Auth::logout();
            session()->flash('auth', [
                'user_id' => $user->id,
                'type' => false,
                'mobile' => $user->mobile,
                'remember' => $request->has('remember')
            ]);

            if ($user->type === 'sms') {
                $code = Code::generateCode($user);
                alert()->success("کد شما برابر است با : $code")->persistent('بسیار خب ');
                session()->push('auth', [
                    'type' => 'sms'
                ]);

                return redirect(route("auth.verify.code.view"));
            }
        }
        return false;
    }
}
