<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }


    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // public function logout(Request $request)
    // {
    //     // $this->guard('admin')->logout();

    //     // $request->session()->invalidate();

    //     // return $this->loggedOut($request) ?: redirect('admin-login');

    //     // Auth::guard('admin')->logout();
    //     // $request->session()->invalidate();
    //     // return redirect()->guest(route( 'admin.login' ));
        
    //     if(Auth::guard('admin')->check()) // this means that the admin was logged in.
    //     {
    //        Auth::guard('admin')->logout();
    //        return redirect()->route('admin.login');
    //     }
    // }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
        protected function guard()
        {
            return Auth::guard('admin');
        }

       
    }
