<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'verification_code',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'verified_at',
    ];


    /**
     * Generate verification code
     *
     * @return $this
     */
    public function generateVerificationCode()
    {
        $this->verification_code = str_random(42);

        $this->save();

        return $this;
    }

    /**
     * Attempts to verify the given user by checking the verification code.
     *
     * @param  string  $verificationCode
     * @return bool
     */
    public function attemptVerification($verificationCode)
    {
        if ($this->isVerified()) {
            return true;
        }

        if ($verificationCode == $this->verification_code) {
            $this->verification_code = null;
            $this->verified_at = $this->freshTimestamp();
            $this->save();

            return true;
        }

        return false;
    }

    /**
     * Check account is verified or not
     *
     * @return bool
     */
    public function isVerified()
    {
        return (bool) $this->verified_at;
    }

    /**
     * Avatar
     *
     * @return string
     */
    public function avatar()
    {
        $imagePath = public_path("images/users/{$this->id}.jpg");
        
        if (file_exists($imagePath)) {
            return asset("images/users/{$this->id}.jpg?" . time());
        }

        return 'https://via.placeholder.com/300x300';
    }
}
