<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Logout\LogoutContract;
use Illuminate\Support\Facades\Session;
class LogoutController extends Controller
{
    protected $repo;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Contracts\LogoutContract  $logoutContract
     * @return void
     */
    public function __construct(LogoutContract $logoutContract) {
        $this->repo = $logoutContract;
    }


    /**
     * Log the user out and redirect to the login page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function signOut() {

        // Call the 'logout' method from the injected repository to perform the logout action.
        $this->repo->logout();

        // Redirect the user to the login page after successfully logging out.
        return redirect()->route('auth.login.get');
    }
}
