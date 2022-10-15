<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate()
    {
        Auth::guard('employee')->logout();
        

        $this->ensureIsNotRateLimited('email');

        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey('email'));

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey('email'));
        

    }

    public function authenticateEmployee()
    {
        Auth::logout();

        $this->ensureIsNotRateLimited('id');

        if (! Auth::guard('employee')->attempt($this->only('id', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey('id'));

            throw ValidationException::withMessages([
                'id' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey('id'));
        
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited($val)
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey($val), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey($val));

        throw ValidationException::withMessages([
            $val => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey($val)
    {
        return Str::transliterate(Str::lower($this->input($val)).'|'.$this->ip());
    }
}
