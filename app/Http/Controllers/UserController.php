<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\User\UserContract;
class UserController extends Controller
{
    protected $repo;

    /**
     * Create a new controller instance.
     *
     * @param \App\Contracts\UserContract $userContract
     */
    public function __construct(UserContract $userContract) {
        $this->repo = $userContract;
    }

}
