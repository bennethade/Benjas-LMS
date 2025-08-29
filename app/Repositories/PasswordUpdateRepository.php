<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use \App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Hash;

class PasswordUpdateRepository
{
    use FileUploadTrait;

   

    public function updatePassword(array $data)
    {
        $user_id  = Auth::user()->id;
        $user = User::where('id', $user_id)->first();


        //Check if the current password is correct

        if (!Hash::check($data['current_password'], $user->password)) {
            return false; // just return false instead of redirecting
        }

        //TUTOR'S LINE BUT NOT WORKING
        // if(!Hash::check($data['current_password'], $user->password)){
        //     return back()->withError(['current_password' => 'Your current password does not match our records.']);
        // }

        // Update the new password
        $user->password = Hash::make($data['new_password']);
        $user->save();

        return $user;
    }
}   