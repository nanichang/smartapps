<?php
namespace App\Repositories\Dashboard;

use App\Models\User;
use App\Repositories\Dashboard\DashboardContract;
class EloquentDashboardRepository implements DashboardContract {

    /**
     * Uploads and associates a profile picture with the authenticated user.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object containing the uploaded file.
     * @return \App\User The updated user model with the new profile picture.
     */
    public function uploadProfilePicture($request) {
        $user = auth()->user();
        $profile = User::where("id", $user->id)->first();

        // Upload the profile picture using the 'uploadProfilePicture' function.
        $profile->profile_picture = uploadProfilePicture($request);
        $profile->save(); // TODO Change this implementation to update method

        // Return the updated user profile.
        return $profile;
    }
}
