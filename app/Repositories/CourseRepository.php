<?php

namespace App\Repositories;

use App\Models\Course;
use App\Models\CourseGoal;
use \App\Traits\FileUploadTrait;

class CourseRepository
{
    use FileUploadTrait;

    public function createCourse(array $data, $photo)
    {
        // dd($data, $photo);

        $course = new Course();

        //Remove course goal from the data
        unset($data['course_goals']);

        //Handle file upload
        if ($photo) {
            // $data['course_image'] = $this->uploadFile($photo, 'course', $photo ? $course->course_image : null);
            $data['course_image'] = $this->uploadFile($photo, 'course', $course->course_image);
        }

        return Course::create($data);
    }

    public function updateCourse(array $data, $photo, $id)
    {
        $course = Course::findOrFail($id);

        //Remove course goal from the data
        unset($data['course_goals']);

        //Handle file upload
        if ($photo) {
            // $data['course_image'] = $this->uploadFile($photo, 'course', $photo ? $course->course_image : null);
            $data['course_image'] = $this->uploadFile($photo, 'course', $course->course_image);
        }

        $course->update($data);
        return $course;
    }

    public function createCourseGoals($courseId, array $goals)
    {
        foreach($goals as $goal){
            if($goal){
                CourseGoal::create([
                    'course_id' => $courseId,
                    'goal_name' => $goal,
                ]);
            }
        }
    }


    public function updateCourseGoals($courseId, array $goals)
    {
        CourseGoal::where('course_id', $courseId)->delete();

        foreach($goals as $goal){
            if($goal){
                CourseGoal::create([
                    'course_id' => $courseId,
                    'goal_name' => $goal,
                ]);
            }
        }
    }

    
}   