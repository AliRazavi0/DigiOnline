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
                $code = Code::generateCode(auth()->user());
                session()->flash('mobile', $data['mobile']);
                alert()->success("کد شما برابر است با : $code")->persistent('بسیار خب ') ;
                return redirect(route('management.2fa.view.code'));
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
        if (!session()->has('mobile')) {
            return redirect(route('management.2fa.view'));
        }
        session()->reflash();
        return view('website.profile.verify-code')->with('mobile', session()->get('mobile'));
    }

    public function postVerifyCode(Request $request)
    {
        $codes = implode('', $request->code);


        $status = Code::checkCodeValidationUser($codes, auth()->user());

        if ($status) {
            auth()->user()->codes()->delete();
            auth()->user()->update([
                'mobile' => session()->get('mobile'),
                'type' => 'sms'
            ]);

            return redirect(route('management.2fa.view'))->with('success', 'عملیات شما با موفقیت انجام گرفت .');
        }

        return redirect(route('management.2fa.view'))->with('error', 'عملیات شما با خطا مواجه شد .');
    }

    protected function validation(Request $request)
    {
        return $request->validate([
            'type' => 'required|in:off,sms',
            'mobile' => 'required_unless:type,off'
        ]);
    }


}
