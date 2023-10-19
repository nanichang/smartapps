<?php

    use App\Jobs\GlobalEmailJob;


    /**
     * If the 'sendmail' function doesn't already exist, it is defined here.
     *
     * @param array $data The data for the email.
     * @throws \Exception If an error occurs when dispatching the email job.
     */
    if (!function_exists('sendmail')) {
        function sendmail(array $data) {
            try {
                // Dispatch a GlobalEmailJob with the provided data.
                dispatch(new GlobalEmailJob($data));
            } catch (\Exception $e) {
                // If an exception is thrown, rethrow it.
                throw $e;
            }
        }

    }


    /**
     * If the 'uploadProfilePicture' function doesn't already exist, it is defined here.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return string The filename of the uploaded profile picture.
     */
    if (!function_exists("uploadProfilePicture")) {
        function uploadProfilePicture($request) {
            // Get the original filename from the request's file.
            $filename = $request->file->getClientOriginalName();

            // Store the file in the 'profile_images' directory in the 'public' disk.
            $request->file->storeAs('profile_images', $filename, 'public');

            // Return the filename.
            return $filename;
        }
    }
