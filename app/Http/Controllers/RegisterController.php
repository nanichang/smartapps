<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Register\RegisterContract;
class RegisterController extends Controller
{
    protected $repo;
    public function __construct(RegisterContract $registerContract) {
        $this->repo = $registerContract;
    }

    public function register() {
        return view('register.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = $this->repo->register($request->all());
        return redirect()->route('dashboard')->with('success','');
    }



}
