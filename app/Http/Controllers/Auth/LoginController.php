<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Setting;
use Auth;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Aboutsetting;
use App\Models\Chose;
use App\Models\Video;
use App\Models\Homespecialist;
use App\Models\Counter;
use App\Models\Clientsay;
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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        // dd();
        if(Auth::check() && Auth::user()->is_admin == 1)
        {
            return '/dashboard/index';
        }
       else if(Auth::check() && Auth::user()->is_admin == 0  )
       {
            $settings=Setting::all();
            return '/profile';
       }


    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function showLoginForm()
    {
        $settings=Setting::all();
        return view('frontend.login', compact('settings'));
    }

}
