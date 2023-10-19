<?php
namespace App\Repositories\Logout;
use App\Repositories\Logout\LogoutContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EloquentLogoutRepository implements LogoutContract {

    /**
     * Log out the currently authenticated user and flush session data.
     *
     * @return void
     */
    public function logout() {
        // Flush session data to remove all session variables.
        Session::flush();

        // Log out the currently authenticated user.
        return Auth::logout();
    }
}
