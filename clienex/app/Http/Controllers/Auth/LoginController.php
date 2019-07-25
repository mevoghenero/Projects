<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Organisation;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    //public $redirectTo = '/product';

    protected function authenticated(Request $request, $user)
    {
        //dd(Auth::user());
      switch (auth()->user()->status) {
        case '0' :
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/login')
        ->with($this->sendFailedLoginResponse($request));

        break;

        case '1':
        return redirect('/organisations');
        break;

        case '2':
        if (auth()->user()->load('organisation')) 
        {
          return redirect(route('outlet.index', auth()->user()->organisation_id));
        }
        break;

        case '3':
        if (auth()->user()->load('outlet')) 
        {
          return redirect(route('product.index', auth()->user()->outlet_id));
        }
        break;
      }

    }

    public function showAdminLoginForm()
    {
      return view('auth.login');
    }

    protected function validateLogin(Request $request)
    {

      $request->validate([
        'email' => 'required|string',
        'password' => 'required|string',
      ]);

    }

    protected function attemptLogin(Request $request)
    {

      return Auth::guard()->attempt(
        $this->credentials($request), $request->has('remember'));

    }

    public function logout(Request $request)
    {
      $this->guard()->logout();

      $request->session()->invalidate();

      return $this->loggedOut($request) ?: redirect(route('login'));
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
  }
