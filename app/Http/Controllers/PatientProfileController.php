<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientProfileController extends Controller
{
    /**
     * Show patient Settings Page
     */
    public function showPatientSettingsPage()
    {
        return view('frontend.patient.settings');
    }

    /**
     * Show patient Password Page
     */
    public function showPatientPasswordPage()
    {
        return view('frontend.patient.password');
    }

    /**
     * Change patient Password old password by new pass & Confirm Password
     */
    public function PatientPasswordChange(Request $request)
    {
        //For Check
        //return $request->all();

        //Old Password check
        if(!password_verify( $request->old_pass, Auth::guard('patient')->user()->password) ){
            return back()->with('danger', 'Old Password not Match');
        }

        //Password Confirmation
        if($request->pass !=$request->pass_confirmation){
            return back()->with('warning', 'Password Confirmation Failed');
        }

        $data=Patient::findOrFail(Auth::guard('patient')->user()->id);
        $data->Update([
            'password' =>Hash::make($request->pass)
        ]);

        //return back()->with('success', 'Patient Password Changed');

        // If we want to logut first:
        Auth::guard('patient')->logout();
        return redirect()->route('login.page')->with('success', 'Patient Password Changed');

        
    }


}
