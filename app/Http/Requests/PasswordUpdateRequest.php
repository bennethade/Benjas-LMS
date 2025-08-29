<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
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
        // return [
        //     'current_password' => 'required|string',
        //     'new_password' => 'required|string|min:8|confirmed',
        // ];
        return [
            'current_password' => ['required'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'], 
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'Please enter your current password.',
            'new_password.required' => 'Please enter a new password.',
            'new_password.min' => 'New password must be at least 8 characters long.',
            'new_password.confirmed' => 'New password confirmation does not match.',
        ];
    }
}
