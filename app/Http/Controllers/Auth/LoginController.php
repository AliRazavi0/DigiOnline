<?php

namespace App\Http\Controllers\Auth;

use App\Code;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
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
