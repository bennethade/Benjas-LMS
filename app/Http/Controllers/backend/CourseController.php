<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseGoal;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\CourseService;


class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    
    public function index()
    {
        $instructorId = Auth::user()->id;
        $allCourses = Course::where('instructor_id', $instructorId)->with('category', 'subcategory')->latest()->get();
        return view('backend.instructor.course.index', compact('allCourses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allCategories = Category::orderBy('name', 'asc')->get();
        return view('backend.instructor.course.create', compact('allCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        $validatedData = $request->validated();
        //Pass data and files to the service
        $course = $this->courseService->createCourse($validatedData, $request->file('image'));

        //Manage course goal
        if(!empty($validatedData['course_goals'])){
            $this->courseService->createCourseGoals($course->id, $validatedData['course_goals']);
        }

        return redirect()->back()->with('success', 'Course created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $allCategories = Category::all();
        $course = Course::with('subcategory')->find($id);
        $courseGoals = CourseGoal::where('course_id', $id)->get();
        return view('backend.instructor.course.edit', compact('allCategories','course', 'courseGoals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, string $id)
    {
        $validatedData = $request->validated();
        //Pass data and files to the service
        $course = $this->courseService->updateCourse($validatedData, $request->file('image'), $id);

        if(!empty($validatedData['course_goals'])){
            $this->courseService->updateCourseGoals($course->id, $validatedData['course_goals']);
        }

        return redirect()->back()->with('success', 'Course updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        if($course->image){
            $imagePath = public_path(parse_url($course->course_image, PHP_URL_PATH));
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $course->delete();
        return redirect()->back()->with('success', 'Course deleted successfully.');
    }


}
