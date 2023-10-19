<?php
namespace App\Repositories\Dashboard;

use App\Models\User;
use App\Repositories\Dashboard\DashboardContract;
class EloquentDashboardRepository implements DashboardContract {
    public function uploadProfilePicture($request) {
        $user = auth()->user();
        $profile = User::where("id", $user->id)->first();
        $profile->profile_picture = uploadProfilePicture($request);
        $profile->save();
        return $profile;
    }
}
