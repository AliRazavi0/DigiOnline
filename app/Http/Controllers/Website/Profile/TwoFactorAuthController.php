<?php

namespace App\Http\Controllers\Website\Profile;

use App\Code;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TwoFactorAuthController extends Controller
{
    public function showManagmentTwoFactorView()
    {
        return view('website.profile.tow-factor-auth');
    }

    public function PostManagmentTwoFactorView(Request $request)
    {
        $data = $this->validation($request);

        if ($data['type'] === 'sms') {
            if (auth()->user()->mobile !== $data['mobile']) {
                $code=Code::generateCode(auth()->user());

               return $code;

                return  redirect(route('management.2fa.view.code'));
            } else {
                auth()->user()->update([
                    'type' => "sms"
                ]);
            }
        }


        if ($data['type'] === 'off') {
            auth()->user()->update([
                'type' => 'off'
            ]);
        }


        return redirect()->back()->with('success', 'تنظیمات شما با موفقیت ابدیت شد .');

    }


    public function getViewVerifyCode()
    {
        return view('auth.verify-code');
    }

    public function postVerifyCode(Request $request)
    {
       $codes=implode('', $request->code);
       dd($codes);
    }

    protected function validation(Request $request)
    {
        return $request->validate([
            'type' => 'required|in:off,sms',
            'mobile' => 'required_unless:type,off'
        ]);
    }



}
