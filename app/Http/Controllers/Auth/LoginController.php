<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request as IlluminateRequest;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected function authenticated(IlluminateRequest $request, $user)
    {
        if ($user->status == 1) {
            return redirect()->intended($this->redirectPath());
        } else {
            $this->guard()->logout();
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors(['active' => 'Your account is blocked.']);
        }
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

}
