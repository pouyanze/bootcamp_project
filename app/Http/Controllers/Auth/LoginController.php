<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
    protected function authenticated(Request $request, $user)
    {
        // Log::info("sss");
        // dd('dd');
        if((Auth::user()->is_admin)=='yes'){
            Log::info('someone loged in. WHO? an admin with id: '. Auth::user()->id);
            return redirect('/admin/home');
           
        }
        elseif ( ($user=Auth::user()) and ((Auth::user()->is_admin)=='no')) {
            Log::info('someone loged in. WHO? a user with id: '. Auth::user()->id);
            return redirect('/ads/userAdsList');
        }
        
        Log::info('loged in. WHO? user with id: '. Auth::user()->id);
        return redirect('/home');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
