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

        $data['allCategory'] = Category::orderBy('name', 'asc')->get();

        //Get the current authenticated user's ID

        $userId = Auth::id();

        $similarCourses = Course::where('category_id', $course->category_id)->where('id', '!=', $course->id)->with('user')->get();

        $data['moreCourseFromInstructor'] = Course::where('instructor_id', $course->instructor_id)->where('id', '!=', $course->id)->with('user')->get();

        $data['relatedCourse'] = Course::where('subcategory_id', $course->subcategory_id)->where('id', '!=', $course->id)->take(3)->get();

        $totalMinutes = CourseLecture::where('course_id', $course->id)->sum('video_duration');

        $hours = floor($totalMinutes / 60);

        $minutes = floor($totalMinutes % 60);

        $seconds = round(($totalMinutes - floor($totalMinutes)) * 60);

        $data['totalLectureDuration'] = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

        return view('frontend.pages.course-details.index', compact('course', 'totalLecture', 'courseContent', 'similarCourses'), $data);
    }



}
