<?php

namespace App\Http\Controllers\Super;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Auth;



class SuperAdminLogin extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:gcj')->except('logout');
    }

    
    public function showLoginForm()
    {
        return view('authSuper.login');
    }

    
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Attempt to log the user in
        if (Auth::guard('gcj')->attempt($credential, $request->member)){
            // If login succesful, then redirect to their intended location
            return redirect()->intended(route('gcj.home'));
        }

        // If Unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
   
    public function logout(Request $request)
    {
        Auth::guard('gcj')->logout();
        return redirect('/');
    }

    //Custom guard for seller
    // protected function guard()
    // {
    //   return Auth::guard('gcj');
    // }
}
