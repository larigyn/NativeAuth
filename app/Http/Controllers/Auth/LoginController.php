<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except(['logout', 'userLogout']);
       $this->middleware('guest')->except('logout', 'userLogout');
   }
   
    protected function credentials(Request $request)
    {
        $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
            ? $this->username()
            : 'name';

        return [
            $field => $request->get($this->username()),
            'password' => $request->password,
        ];
    }

//     public function username()
// {
//     $field = filter_var(request()->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
//     request()->merge([$field => request()->input('login')]);
//     return $field;
// }

   public function userLogout()
   {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    // protected function getFailedLoginMesssage(Request $request)
    // {
    //     return 'something wrong with your head?';
    // }

    // protected function sendFailedLoginResponse(Request $request)
    // {
    //     throw ValidationException::withMessages([
    //         $this->username() => [trans('auth.failed')],
    //     ]);
    // }
}
