<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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

    // use AuthenticatesUsers;

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

    public function login(Request $request)
    {
        $this->validateLogin($request);
        $this->attemptLogin($request);
        return $this->loginResponse($request);
        
        
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function attemptLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $this->FailedLoginResponse('email');
        }
        $validatePassword = Hash::check($request->password, $user->password);
        if (!$validatePassword) {
            $this->FailedLoginResponse('password');
        }
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
    }

    protected function FailedLoginResponse($request)
    {
        throw ValidationException::withMessages([
            $request => [trans('auth.failed')],
        ]);
    }
    protected function loginResponse(Request $request)
    {
        $request->session()->regenerate();
        return redirect()->intended($this->redirectTo);
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    protected function guard()
    {
        return Auth::guard();
    }
}
