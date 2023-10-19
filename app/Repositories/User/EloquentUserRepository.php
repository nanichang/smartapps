<?php
namespace App\Repositories\User;
use App\Repositories\User\UserContract;
use Illuminate\Support\Facades\Auth;
class EloquentUserRepository implements UserContract {

    /**
     * Retrieve the authenticated user.
     *
     * @return User|null The authenticated user or null if not logged in.
     */
    public function getAuthUser(){
        // Attempt to retrieve the authenticated user.
        // Returns the User model if logged in, otherwise null.
        return Auth::user();
    }
}
