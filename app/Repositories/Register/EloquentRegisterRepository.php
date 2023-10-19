<?php
namespace App\Repositories\Register;
use App\Repositories\Register\RegisterContract;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EloquentRegisterRepository implements RegisterContract {
    public function register($request) {
        $user = new User();
        $user = $this->userProperties($user, $request);

        // Define Email params
        if($user->id) {
            $params['data']           = ['greetings' => 'Hello '. $user->name];
            $params['to']             = $user->email;
            $params['template_type']  = 'markdown';
            $params['template']       = 'emails.master-template';
            $params['subject']        = 'Welcome to Smart Apps';
            $params['from_email']     = 'jondoe@example.com';
            $params['from_name']      = 'Team Smart Apps';
            sendmail($params);
        }
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
