<?php

namespace App\Http\Controllers\Auth;

use App\Preference;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin',['except'=>['logout']]);
    }

    public function showLoginForm(){
        $pre = Preference::all();

        foreach ($pre as $depName){

        }
        return view('auth.admin-login')->with('depName',$depName);
    }

    public function login(Request $request){

        //validate the form data
//        $this->validate($request,[
//            'username'=>'required|username',
//            'password'=>'required|min:6'
//        ]);
        //attempt to log the user in

        if (Auth::guard('admin')->attempt(['username'=>$request->username,'password'=>$request->password],$request->remember)){
        //if successful, then redirect to their intended location

            return redirect()->intended(route('admin-dashboard'));
        }
        //if unsuccessful, then redirect back to the login with the form data
        $error='Credentials does not match our record';
        return redirect()
            ->back()
            ->withInput($request->only('username','remember'))
            ->with('error',$error);

    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/');
    }

    public function username()
    {
        return 'username';
    }
}
