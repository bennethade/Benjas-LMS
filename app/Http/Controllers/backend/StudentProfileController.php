<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Requests\ProfileRequest;
use App\Services\PasswordUpdateService;
use App\Services\ProfileService;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    protected $profileService, $passwordUpdateService;

    public function __construct(ProfileService $profileService, PasswordUpdateService $passwordUpdateService)
    {
        $this->profileService = $profileService;
        $this->passwordUpdateService = $passwordUpdateService;
    }   



    public function index()
    {
        return view('backend.student.profile.index');
    }

    public function store(ProfileRequest $request)
    {
        //Pass data and files to the service
        $this->profileService->saveProfile($request->validated(), $request->file('photo'));
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }


    public function passwordSetting(PasswordUpdateRequest $request)
    {
        $success = $this->passwordUpdateService->updatePassword($request->validated());

        if (!$success) {
            return redirect()->back()->with('error', 'Current password does not match.');
        }

        return redirect()->back()->with('success', 'Password updated successfully!');
    }



}
