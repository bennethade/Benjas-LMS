<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
        $sliderId = $this->route('slider'); // Get the slider ID from the route if available
        return [
            'title' => 'required|string|max:1000',
            'short_description' => 'nullable|string|max:3000',
            'video_url' => 'nullable|url',
            'image' => $sliderId ? 'nullable' : 'required',
        ];
    }
}
