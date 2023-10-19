<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Dashboard\DashboardContract;
use App\Repositories\User\UserContract;

class DashboardController extends Controller
{
    protected $repo;
    protected $userRepo;

    /**
     *
     * Create a new controller instance.
     *
     * @param DashboardContract $dashboardContract
     * @param UserContract $userContract
     *
     */

    public function __construct(DashboardContract $dashboardContract, UserContract $userContract) {
        $this->repo = $dashboardContract;
        $this->userRepo = $userContract;
        $this->middleware('auth');
    }


    /**
     * Display the user's dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get the currently authenticated user
        $user = $this->userRepo->getAuthUser();

        // Return a view for the dashboard, passing the user data
        return view('dashboard.index', compact('user'));
    }



    /**
     * Update the user's profile picture.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // validate if file exist
        if($request->file() != null) {
            // Send the file to the reposity for upload
            if($this->repo->uploadProfilePicture($request)) {
                return redirect()->back()->with('success','Profile picture uploaded successfully');
            }
            return redirect()->back()->with('error','Profile picture upload fialed');
        }
        return redirect()->back()->with('error','Profile picture upload fialed');
    }

}
