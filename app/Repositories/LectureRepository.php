<?php

namespace App\Repositories;

use App\Models\CourseLecture;

class LectureRepository
{

    public function createLecture(array $data)
    {
        // return CourseLecture::create($data);

        // dd($data);


        $course = new CourseLecture();

        return CourseLecture::create($data);
    }

    public function updateLecture($data, $id)
    {
        $lecture = CourseLecture::find($id);
        $lecture->update($data);

        return $lecture->fresh();
    }
    
    
}   