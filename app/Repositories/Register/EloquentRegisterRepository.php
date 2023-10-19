<?php
namespace App\Repositories\Register;
use App\Repositories\Register\RegisterContract;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EloquentRegisterRepository implements RegisterContract {
    public function register($request) {
        $user = new User();
        $user = $this->userProperties($user, $request);
        // if($user->id) {
        //     sendWelcomeEmail($user);
        // }
        return $user;

    }

    private function userProperties($user, $request) {
        // dd($request);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();
        return $user;
    }
}
