<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Dashboard\DashboardContract;
use App\Repositories\User\UserContract;

class DashboardController extends Controller
{
    protected $repo;
    protected $userRepo;
    public function __construct(DashboardContract $dashboardContract, UserContract $userContract) {
        $this->repo = $dashboardContract;
        $this->userRepo = $userContract;
        $this->middleware('auth');
    }

    public function index()
    {
        $user = $this->userRepo->getAuthUser();
        return view('dashboard.index', compact('user'));
    }



    public function update(Request $request)
    {
        if($request->file() != null) {
            if($this->repo->uploadProfilePicture($request)) {
                return redirect()->back()->with('success','Profile picture uploaded successfully');
            }
            return redirect()->back()->with('error','Profile picture upload fialed');
        }
        return redirect()->back()->with('error','Profile picture upload fialed');
    }

}
