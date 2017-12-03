<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerificationController extends Controller
{
    /**
     * GET /verifications/{user}/foo
     * Verify an user account
     *
     * @param  \App\User $user
     * @param  string $verificationCode
     * @return \Illuminate\Http\Response
     */
    public function verify(User $user, $verificationCode)
    {
        if ($user->attemptVerification($verificationCode)) {

            auth()->login($user);

            return redirect()->route('users.show', $user)
                ->withSuccess("Your account has been successfully verified, $user->name!");
        }
        
        return redirect()->route('/')
            ->withError('Sorry! we are unable to verify your account!');
    }
}
