<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
        $this->middleware('guest')->except('logout');
    }
//-------------------------------User Block--------------start
    // public function authenticate(Request $request)
    // {
    //    if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
    //         // The user is active, not suspended, and exists.
    //         return redirect()->intended('/home');
    //     }
    // }
//logout for admin and user
    public function logout( Request $request )
    {
        if(Auth::guard('admin')->check()) // this means that the admin was logged in.
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

        $this->guard()->logout();
        $request->session()->invalidate();

    return $this->loggedOut($request) ?: redirect('/');
}

    protected function credentials(Request $request)
    {        
        return ['email' => $request->{$this->username()}, 'password' => $request->password, 'status' => 1];
    }
//-----------------------------------Ebd User Block    
}
