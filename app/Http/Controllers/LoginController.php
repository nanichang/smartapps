<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Login\LoginContract;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    protected $repo;
    public function __construct(LoginContract $loginContract) {
        $this->repo = $loginContract;
    }

    public function getLogin(){
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if ($this->repo->login($credentials)) {
            return redirect()->intended('dashboard')->withSuccess('Signed in');
        }

        return redirect()->back()->withErrors('Login details are not valid');
    }

}
