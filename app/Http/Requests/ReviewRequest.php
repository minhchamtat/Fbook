<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lang;

class ReviewRequest extends FormRequest
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
            'title' => 'min:5|max:191',
            'content' => 'required',
            'star' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.min' => Lang::get('validation.min.string'),
            'title.max' => Lang::get('validation.max.string'),
            'content.required' => Lang::get('validation.required'),
        ];
    }
}
