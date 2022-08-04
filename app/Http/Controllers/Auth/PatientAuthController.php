<?php

namespace App\Http\Controllers\Auth;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Unique;

class PatientAuthController extends Controller
{
    /**
     * Patient Register
     */
    public function register(Request $request)
    {
        //return $request->all();

        //Data validate
        $this->validate($request, [
            'name'      =>'required',
            'email'     =>'required|Unique:patients|email',
            'mobile'    =>'required|Unique:patients',
            'pass'      =>'required|confirmed'

        ]);

        //data store
        $patient = Patient::create([
            'name'      =>$request->name,
            'email'     =>$request->email,
            'mobile'    =>$request->mobile,
            'password'  =>password_hash($request->pass, PASSWORD_DEFAULT),
        ]);
        return redirect()->route('patient.reg.page')->with('success', "Hi ". $patient->name .", Your account is ready.  Now Login");
        
    }


    /**
     * Patient Login
     */
    public function login(Request $request)
    {
        //return $request->all();

        //Data validate
        $this->validate($request, [
            'email'     =>'required',
            'password'  =>'required',

        ]);

        //return $request->all(); for check//

    //Auth Process(configuration)
    //if(Auth::guard('patient')->attempt([ "email" => $request->email,"password"=>$request->password])){   
        //echo "You are Log In";
    //}else{
        //echo "You are Failed";
    //}
    
    //Login in Authentication and Authorization by email and mobile.
    if(Auth::guard('patient')->attempt([ "email" => $request->email,"password"=>$request->password]) || Auth::guard('patient')->attempt([ "mobile" => $request->email,"password"=>$request->password]) )
    {   
    return redirect()->route('patient.dash.page');
    }else{
    return redirect()->route('login.page')->with('danger', 'Authentication Failed');
    }

        
    }
    
}
