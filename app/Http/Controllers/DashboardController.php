<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Dashboard\DashboardContract;
class DashboardController extends Controller
{
    protected $repo;
    public function __construct(DashboardContract $dashboardContract) {
        $this->repo = $dashboardContract;
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}
