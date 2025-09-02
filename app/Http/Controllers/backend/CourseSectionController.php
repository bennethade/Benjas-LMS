<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseSection;
use Illuminate\Http\Request;

class CourseSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'section_title' => 'required|string|max:255',
        ]);

        //Store the data in the db
        CourseSection::create($validatedData);

        return redirect()->back()->with('success', 'New Section Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::find($id);

        $courseWiseLecture = CourseSection::with('lecture')->where('course_id', $id)->get();

        return view('backend.instructor.course-section.index', compact('course', 'courseWiseLecture'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CourseSection::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Section Deleted Successfully!');
    }
}
