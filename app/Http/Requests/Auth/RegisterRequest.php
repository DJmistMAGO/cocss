<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'school_id' => ['required', 'string', 'unique:users'],
            'name' => ['required', 'string'],
            'bdate' => ['required', 'date'],
            'phone_no' => ['required', 'string',],
            'sorsu_email' => ['required', 'string', 'email', 'max:50', 'unique:users', 'ends_with:@sorsu.edu.ph'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'sorsu_email.ends_with' => 'The email must end with @sorsu.edu.ph',
            'school_id.unique' => 'The school ID is already taken!',
            'sorsu_email.unique' => 'The email is already taken!',
            'school_id.required' => 'The school ID is required!',
            'name.required' => 'The name is required!',
            'bdate.required' => 'The birthdate is required!',
            'phone_no.required' => 'The phone number is required!',
            'sorsu_email.required' => 'The email is required!',
            'password.required' => 'The password is required!',
            'password.confirmed' => 'The password confirmation does not match!',
        ];
    }
}
