<?php
namespace App\Repositories\Logout;
use App\Repositories\Logout\LogoutContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EloquentLogoutRepository implements LogoutContract {
    public function logout() {
        Session::flush();
        return Auth::logout();
    }
}
