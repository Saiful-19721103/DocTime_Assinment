<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    /**
     * Send Req for Login Facebook
     */
    public function sendFacebookLoginReq()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * facebook login info of User(Who is loged)
     */
    public function loginWithFacebook()
    {
        $user = Socialite::driver('facebook')->user();
    }
}
