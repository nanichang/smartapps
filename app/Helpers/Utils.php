<?php

    use App\Jobs\GlobalEmailJob;

    if (!function_exists('sendmail')) {
        function sendmail(array $data) {
            try {
                dispatch(new GlobalEmailJob($data));
            } catch (\Exception $e) {
                throw $e;
            }
        }

    }

    if (!function_exists("uploadProfilePicture")) {
        function uploadProfilePicture($request) {
            $filename = $request->file->getClientOriginalName();
            $request->file->storeAs('profile_images', $filename, 'public');
            return $filename;
        }
    }
