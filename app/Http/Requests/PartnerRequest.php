<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:500', // Name is required, must be a string, and max 500 characters
        ];

        if($this->isMethod('post'))
        {
            //For Create
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048';
        }else{
            //For Update
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048';
        }

        return $rules;
    }
}
