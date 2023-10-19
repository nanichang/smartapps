<?php
namespace App\Repositories\Login;
use App\Repositories\Login\LoginContract;
use Illuminate\Support\Facades\Auth;
class EloquentLoginRepository implements LoginContract {
    public function login($credentials) {
        return Auth::attempt($credentials) ? Auth::user() : null;
    }
}
