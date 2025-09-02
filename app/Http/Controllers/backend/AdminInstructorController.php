<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminInstructorController extends Controller
{
    public function index()
    {
        $allInstructors = User::where('role', 'instructor')->latest()->get();
        return view('backend.admin.instructor.index', compact('allInstructors'));
    }


    public function updateStatus(Request $request)
    {
        $user = User::find($request->user_id);
        if($user){
            $user->status = $request->status;
            $user->save();

            return response()->json(['success' => true, 'message' => 'Instructor status updated successfully.']);
        }

        return response()->json(['success' =>'false', 'message' => 'User not found.'], 404);
    }




    public function create()
    {
        
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
        return view('backend.pages.instructor.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    

    // Instructor Active List
    public function instructorActiveList(Request $request)
    {
        $activeInstructors = User::where('role', 'instructor')->where('status', '1')->latest()->get();
        return view('backend.admin.instructor.active', compact('activeInstructors'));
    }
}
