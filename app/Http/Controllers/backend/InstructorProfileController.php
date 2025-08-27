<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Services\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

class InstructorProfileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }   

    public function index()
    {
        return view('backend.instructor.profile.index');
    }

    public function storeProfile(ProfileRequest $request)
    {
        // return $request->validated();

        
        //Pass data and files to the service
        $this->profileService->saveProfile($request->validated(), $request->file('photo'));
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function setting()
    {
        return view('backend.instructor.profile.setting');
    }
}
