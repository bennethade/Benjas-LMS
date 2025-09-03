<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LectureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'course_id' => 'required|exists:courses,id',
            'course_section_id' => 'required|exists:course_sections,id',
            'lecture_title' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
            'content' => 'required|string',
            'video_duration' => 'nullable',
        ];
    }
}
