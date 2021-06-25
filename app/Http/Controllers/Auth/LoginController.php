<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

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
    protected $redirectTo = RouteServiceProvider::LOGIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
 
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
    }

    $this->incrementLoginAttempts($request);

    $user = User::where('email', $request->email)
    ->where('status', 'Active')
    ->first();

    if (!$user) {
        return $this->sendFailedLoginResponse($request);
        // return "<script>Credentials are not valid. Please Contact HBOX !</script>";
    }

    if ($this->attemptLogin($request)) {
        return $this->sendLoginResponse($request);
    }

        return $this->sendFailedLoginResponse($request);
    }

    protected function sendFailedLoginResponse(Request $request, $trans = 'auth.failed')
    {
        $errors = ['email' => trans($trans)];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()
            ->back()
            ->withErrors($errors);
    }

}
