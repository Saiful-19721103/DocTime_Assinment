<?php

namespace App\Http\Controllers\Auth;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            'mobile'    =>'',
            'password'  =>'required',

        ]);

        return $request->all();

        
    }
    
}
