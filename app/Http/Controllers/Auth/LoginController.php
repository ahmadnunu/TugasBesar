<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/posts/index'; // Setelah login, redirect ke halaman posts

    /**
     * Logout user dan redirect ke halaman login.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        $this->guard()->logout(); // Logout user

        $request->session()->invalidate(); // Menghapus session

        $request->session()->regenerateToken(); // Regenerasi CSRF token

        return redirect('/login'); // Redirect ke halaman login setelah logout
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout'); // Pastikan hanya guest yang bisa mengakses login
    }
}
    