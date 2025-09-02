<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseLecture;
use App\Models\CourseSection;
use App\Models\InfoBox;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendDashboardController extends Controller
{
    public function home()
    {
        $allSliders = Slider::latest()->get();
        $allInfoBox = InfoBox::all();
        $allCategories = Category::inRandomOrder()->limit(6)->get();

        $categories = Category::all();
        $courseCategory = Category::with('course', 'course.user', 'course.course_goal')->get();

        // dd($courseCategory->toArray());

        return view('frontend.pages.home.index', compact('allSliders', 'allInfoBox', 'allCategories','categories', 'courseCategory'));
    }


    public function viewCourse($slug)
    {
        $course = Course::where('course_name_slug', $slug)->with('category', 'subcategory', 'user', 'course_goal')->first();

        $totalLecture = CourseLecture::where('course_id', $course->id)->count();

        $courseContent = CourseSection::where('course_id', $course->id)->with('lecture')->get();

        //Get the current authenticated user's ID

        $userId = Auth::id();

        $similarCourses = Course::where('category_id', $course->category_id)->where('id', '!=', $course->id)->with('user')->get();

        return view('frontend.pages.course-details.index', compact('course', 'totalLecture', 'courseContent', 'similarCourses'));
    }



}
