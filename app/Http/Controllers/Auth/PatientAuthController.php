<?php

namespace App\Http\Controllers\Auth;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Unique;
use App\Notifications\PatientAccountActivationNotification;

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
            'name' => 'required',
            'email' => 'required|email|unique:patients',
            'mobile' => 'required',
            'pass' => 'required|confirmed',
        ]);

        //Create Token
        //For Check
        //return $token = md5(time().rand());
        $token = md5(time().rand());

        

        //data store
        $patient = Patient::create([
            'name'      =>$request->name,
            'email'     =>$request->email,
            'mobile'    =>$request->mobile,
            'access_token'=>$token,
            'password'  =>password_hash($request->pass, PASSWORD_DEFAULT),
        ]);

        //send activation link to patient email
        $patient->notify(new PatientAccountActivationNotification($patient));

        //return back
        return redirect()->route('patient.reg.page')->with('success', "Hi ". $patient->name .", Your account is ready.  Now Login");
        
    }

    /**
     * Patient Account Activation
     */
    public function patientAccountActivation($token = null)
    {
        // check token(If token not match)
        if( !$token){
            return redirect()->route('login.page')->with('danger', 'Access tokennot found');
        }

        // check token(If token not match)
        if( $token ){
            $patient_data = Patient::where('access_token', $token);

            $patient_data->update([
                'access_token'  =>NULL,
                'Status'        =>true,
            ]);

            if( $patient_data ){
                return redirect()->route('login.page')->with('success', 'Hi' . $patient_data->name . 'Your account is Varifyed, Now Login');
            }else{
                return redirect()->route('login.page')->with('warning', 'Access tokennot not Match');
            }
                    
        }
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

    /**
     * Patient LogOut Methode
     */
    public function logout()
    {
        Auth::guard('patient')->logout();
        return redirect()->route('login.page');
    }
}
