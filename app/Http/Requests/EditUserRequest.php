<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lang;

class EditUserRequest extends FormRequest
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
            'workspace' => 'required|max:50',
            'office_id' => 'nullable',
            'chatwork_id' => 'nullable|max:50',
        ];
    }

    public function messages()
    {
        return [
            'workspace.max' => Lang::get('validation.max.string'),
            'workspace.required' => Lang::get('validation.required'),
            'chatwork_id.unique' => Lang::get('validation.unique'),
            'chatwork_id.max' => Lang::get('validation.max.string'),
        ];
    }
}
