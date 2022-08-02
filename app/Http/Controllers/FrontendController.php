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

    /**
     * Patient Register Page
     */
    public function showPatientRegisterPage()
    {
        return view('frontend.patient.register');
    }

    /**
     * Patient Dashboard Page
     */
    public function showPatientDashboardPage()
    {
        return view('frontend.patient.dashboard');
    }

    /**
     * Doctor Register Page
     */
    public function showDoctorRegisterPage()
    {
        return view('frontend.doctor.register');
    }

    /**
     * Doctor Dashboard Page
     */
    public function showDoctorDashboardPage()
    {
        return view('frontend.doctor.dashboard');
    }
    
    
}
