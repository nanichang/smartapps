<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Login\LoginContract;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    protected $repo;

    /**
     * Create a new instance of the controller.
     *
     * @param \App\Contracts\LoginContract $loginContract
     */
    public function __construct(LoginContract $loginContract) {
        $this->repo = $loginContract;
    }

    /**
     * Display the login form.
     *
     * @return \Illuminate\View\View
     */
    public function getLogin(){
        return view('login.login');
    }


    /**
     * Process the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
         // Validate the incoming request data
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Retrieve email and password from the request
        $credentials = $request->only('email', 'password');

        // Attempt to log in using the provided credentials
        if ($this->repo->login($credentials)) {
            return redirect()->intended('dashboard')->withSuccess('Signed in');
        }

        // If login is unsuccessful, redirect back with an error message
        return redirect()->back()->withErrors('Login details are not valid');
    }

}
