<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StudentEdit extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|max:255|email',
            'phone_number' => 'required|integer|min:10',
            'project_title' => 'required|string',
            'student_id' => 'required|string'

        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'first name field is required',
            'first_name.string' => 'first name should be string',
            'last_name.required' => 'last name field is required',
            'last_name.string' => 'last name should be string',
            'email.required' => 'email field is required',
            'email.string' => 'email should be string',
            'email.max' => 'email should has less than 255 characters',
            'email.email' => 'email type is wrong',
            'phone_number.required' => 'phone_number field is required',
            'phone_number.integer' => 'phone_number should be integer value',
            'phone_number.min' => ' Phone number length is invalid',
            'project_title.required' => 'project title field is required',
            'project_title.string' => 'project title should be string',
            'student_id.required' => 'Student ID field is required',
            'student_id.string' => 'Student ID should be string',
            'student_id.check_student_exist' => 'Student ID is already exists'

        ];
    }

}
