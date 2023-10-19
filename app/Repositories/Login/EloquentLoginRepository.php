<?php
namespace App\Repositories\Login;
use App\Repositories\Login\LoginContract;
use Illuminate\Support\Facades\Auth;
class EloquentLoginRepository implements LoginContract {

    /**
     * Attempt to log in a user with the given credentials.
     *
     * @param array $credentials The user login credentials (usually email and password).
     * @return \App\User|null The authenticated user if login is successful, or null on failure.
     */
    public function login($credentials) {
        // If successful, return the authenticated user; otherwise, return null.
        return Auth::attempt($credentials) ? Auth::user() : null;
    }
}
