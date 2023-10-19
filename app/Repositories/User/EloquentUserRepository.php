<?php
namespace App\Repositories\User;
use App\Repositories\User\UserContract;
use Illuminate\Support\Facades\Auth;
class EloquentUserRepository implements UserContract {
    public function getAuthUser(){
        return Auth::user();
    }
}
