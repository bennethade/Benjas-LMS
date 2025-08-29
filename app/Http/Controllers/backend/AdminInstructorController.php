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
            return response()->json(['success' => 'Instructor status updated successfully.']);
        }
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

    // Update Instructor Status
    public function updateStatus(Request $request)
    {
        // return $request->all();
        $instructor = User::find($request->user_id);
        $instructor->status = $request->status;
        $instructor->save();
        return response()->json(['success' => 'Instructor status updated successfully.']);
    }

    // Instructor Active List
    public function instructorActiveList()
    {
        return view('backend.pages.instructor.active_list');
    }
}
