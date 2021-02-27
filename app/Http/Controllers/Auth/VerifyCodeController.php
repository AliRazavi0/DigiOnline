<?php

namespace App\Http\Controllers\Auth;

use App\Code;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyCodeController extends Controller
{
    public function getVerifyCode()
    {
        if (!session()->has('auth')) {
            return redirect(route('login'));
        }
        session()->reflash();
        return view('auth.verify-code')->with([
            'mobile' => session()->get('auth')['mobile']
        ]);
    }

    public function postVerifyCode(Request $request)
    {
        $codes = implode('', $request->code);

        $user = User::findOrFail(session()->get('auth')['user_id']);

        $status = Code::checkCodeValidationUser($codes, $user);

        if ($status) {
            $user->codes()->delete();
            if (Auth::loginUsingId($user->id, session()->get('remember'))) {
                return redirect(route('home'));
            } else {
                alert()->error('کد وارد شده صحیح نمی باشد .')->persistent('بسیار خب');
                return redirect(route('login'));
            }
        } else {
            alert()->error('کد وارد شده صحیح نمی باشد .')->persistent('بسیار خب');
            return redirect(route('login'));
        }
    }
}
