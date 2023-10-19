<?php
namespace App\Repositories\Register;
use App\Repositories\Register\RegisterContract;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EloquentRegisterRepository implements RegisterContract {

    /**
     * Register a new user and send a welcome email if successful.
     *
     * @param array $request The user registration data.
     *
     * @return User The registered user object.
     */
    public function register($request) {
        // Create a new User instance.
        $user = new User();

        // Populate user properties from the request data.
        $user = $this->setUserProperties($user, $request);

        // If the user is successfully registered, send a welcome email.
        if($user->id) {
            $params['data']           = ['greetings' => 'Hello '. $user->name];
            $params['to']             = $user->email;
            $params['template_type']  = 'markdown';
            $params['template']       = 'emails.master-template';
            $params['subject']        = 'Welcome to Smart Apps';
            $params['from_email']     = 'jondoe@example.com';
            $params['from_name']      = 'Team Smart Apps';

            // Send email notification
            sendmail($params);
        }
        return $user;

    }

    /**
     * Set user properties and save to the database.
     *
     * @param User   $user     The User model to update.
     * @param array  $request  The user data for updating.
     *
     * @return User The updated user object.
     */
    private function setUserProperties($user, $request) {
        // dd($request);
        // Assign user properties from the request data.
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);

        // Save the updated user to the database.
        $user->save();

        //return the newly created user record
        return $user;
    }
}
