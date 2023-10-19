<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Register\RegisterContract;
class RegisterController extends Controller
{
    protected $repo;

    /**
     * Create a new controller instance and set the repository for user registration.
     *
     * @param RegisterContract $registerContract
     */
    public function __construct(RegisterContract $registerContract) {
        // Set the repository for user registration using dependency injection.
        $this->repo = $registerContract;
    }


    /**
     * Display the registration form view.
     *
     * @return \Illuminate\View\View
     */
    public function register() {
        return view('register.register');
    }

    /**
     * Store a newly created user after a valid registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $this->repo->register($request->all());
        return redirect()->route('dashboard')->with('success','Registration successful');
    }



}
