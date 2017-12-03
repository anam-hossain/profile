<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * GET /login
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($this->attemptLogin($request)) {
            return redirect()->route('home');
        }

        return redirect()->route('login')
            ->withError("Email or password not correct. Please try again.");
    }
    
    /**
     * GET /logout
     * Logout a user
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        
        return redirect()->route('home');
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return Auth::attempt($request->only('email', 'password'));
    }
}
