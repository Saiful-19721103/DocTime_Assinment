<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Show Home Page
     */
    public function showHomePage()
    {
        return view('frontend.home');
    }
    /**
     * Show Login Page
     */
    public function showLoginpage()
    {
        return view('frontend.login');
    }
    
}
