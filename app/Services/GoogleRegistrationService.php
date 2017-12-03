<?php

namespace App\Services;

use App\User;

class GoogleRegistrationService
{
    /**
     * Check whether a user exist or not
     *
     * @param  \stdClass  $user
     * @return bool
     */
    public function isRegistered($user)
    {
        return User::whereEmail($user->email)->exists();
    }

    /**
     * Register a google user
     *
     * @param \stdClass  $user
     * @return \App\User
     */
    public function register($user)
    {
        $user = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar_original,
        ]);

        $user->verified_at = now();
        $user->save();

        return $user;
    }
}