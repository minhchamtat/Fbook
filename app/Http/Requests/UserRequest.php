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
            'name' => 'max:100',
            'email' => 'email|unique:users|max:100',
            'password' => 'min:6',
            'phone' => 'nullable|max:50',
            'employee_code' => 'unique:users|max:50',
            'reputation_point' => 'nullable',
            'avatar' => 'nullable|image',
            'workspace' => 'max:50',
            'office_id' => 'nullable',
            'chatwork_id' => 'nullable|max:50',
        ];
    }

    public function messages()
    {
        return [
            'name.name' => Lang::get('validation.max.string'),
            'email.email' => Lang::get('validation.email'),
            'email.unique' => Lang::get('validation.unique'),
            'phone.max' => Lang::get('validation.max.string'),
            'password.required' => Lang::get('validation.required'),
            'password.min' => Lang::get('validation.min.string'),
            'employee_code.unique' => Lang::get('validation.unique'),
            'avatar.image' => Lang::get('validation.image'),
            'workspace.max' => Lang::get('validation.max.string'),
            'chatwork_id.required' => Lang::get('validation.unique'),
            'chatwork_id.max' => Lang::get('validation.max.string'),
        ];
    }
}
