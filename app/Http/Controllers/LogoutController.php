<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Logout\LogoutContract;
use Illuminate\Support\Facades\Session;
class LogoutController extends Controller
{
    protected $repo;
    public function __construct(LogoutContract $logoutContract) {
        $this->repo = $logoutContract;
    }

    public function signOut() {
        $this->repo->logout();
        return redirect()->route('auth.login.get');
    }
}
