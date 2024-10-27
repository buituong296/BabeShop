<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

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
        $this->middleware('guest')->except(methods: 'logout');
        $this->middleware('auth')->only('logout');
    }
    public function login(Request $request)
    {
        // Validate the login request
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if the user account is locked
            if ($user->is_locked == 2) {
                Auth::logout();
                return redirect()->back()->withErrors(['error' => 'Tài khoản này đã bị xóa.']);
            }

            // Redirect the user to their intended location
            return redirect()->intended($this->redirectTo);
        }

        return redirect()->back()->withErrors(['error' => 'Thông tin không đúng.']);
    }
}
