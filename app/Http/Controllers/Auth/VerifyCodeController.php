<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerifyCodeController extends Controller
{
    public function getVerifyCode()
    {
        if (!session()->has('auth')){
            return redirect(route('home'));
        }
        return view('auth.verify-code')->with([
            'mobile'=>session()->get('auth')['mobile']
        ]);
    }
}
