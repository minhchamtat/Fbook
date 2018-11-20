<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lang;

class UserRequest extends FormRequest
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
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users|max:100',
            'password' => 'required|min:6|confirmed',
            'phone' => 'nullable|max:50|regex:/^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$/i',
            'employee_code' => 'required|unique:users|max:50',
            'reputation_point' => 'nullable',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif,bmp|size:500',
            'workspace' => 'required|max:50',
            'office_id' => 'nullable',
            'chatwork_id' => 'nullable|max:50',
            'file' => 'size:500',
            'password_confirmation' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.max' => Lang::get('validation.max.string'),
            'email.email' => Lang::get('validation.email'),
            'email.max' => Lang::get('validation.max.string'),
            'email.unique' => Lang::get('validation.unique'),
            'phone.max' => Lang::get('validation.max.string'),
            'phone.regex' => Lang::get('validation.regex'),
            'password.min' => Lang::get('validation.min.string'),
            'employee_code.unique' => Lang::get('validation.unique'),
            'employee_code.max' => Lang::get('validation.max.string'),
            'avatar.image' => Lang::get('validation.image'),
            'avatar.mimes' => Lang::get('validation.mimes'),
            'avatar.size' => Lang::get('validation.size.file'),
            'workspace.max' => Lang::get('validation.max.string'),
            'workspace.required' => Lang::get('validation.required'),
            'chatwork_id.unique' => Lang::get('validation.unique'),
            'chatwork_id.max' => Lang::get('validation.max.string'),
            'file.size' => Lang::get('validation.size.file'),
        ];
    }
}
