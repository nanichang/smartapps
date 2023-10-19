<?php
    use Illuminate\Support\Facades\Mail;

    function sendWelcomeEmail($user, $code) {

        Mail::send('emails.welcome', [
            'user' => $user,
            'code' => $code
        ], function($message) use ($user) {
            $message->to($user->email);
            $message->subject("Hello $user->first_name, Welcome to Smart Apps.");
        });
    }
