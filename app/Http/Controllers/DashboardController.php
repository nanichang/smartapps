<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Dashboard\DashboardContract;
class DashboardController extends Controller
{
    protected $repo;
    public function __construct(DashboardContract $dashboardContract) {
        $this->repo = $dashboardContract;
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard.index');
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
