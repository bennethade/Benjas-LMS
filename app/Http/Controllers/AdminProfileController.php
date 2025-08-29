<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Requests\ProfileRequest;
use App\Services\PasswordUpdateService;
use App\Services\ProfileService;

class AdminProfileController extends Controller
{
    protected $profileService, $passwordUpdateService;

    public function __construct(ProfileService $profileService, PasswordUpdateService $passwordUpdateService)
    {
        $this->profileService = $profileService;
        $this->passwordUpdateService = $passwordUpdateService;
    }   

    public function index()
    {
        return view('backend.admin.profile.index');
    }

    public function storeProfile(ProfileRequest $request)
    {
        //Pass data and files to the service
        $this->profileService->saveProfile($request->validated(), $request->file('photo'));
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function setting()
    {
        return view('backend.admin.profile.setting');
    }


    public function passwordSetting(PasswordUpdateRequest $request)
    {
         //Pass data and files to the service
        // $this->passwordUpdateService->updatePassword($request->validated());
        // return redirect()->back()->with('success', 'Password updated successfully!');
    

        $success = $this->passwordUpdateService->updatePassword($request->validated());

        if (!$success) {
            return redirect()->back()->with('error', 'Current password does not match.');
        }

        return redirect()->back()->with('success', 'Password updated successfully!');
    }

}
