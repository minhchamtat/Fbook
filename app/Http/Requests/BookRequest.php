<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lang;

class BookRequest extends FormRequest
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
            'title' => 'required|min:5|max:191',
            'description' => 'required|min:5',
            'author' => 'required|min:5|max:191',
            'sku' => 'min:5',
            'avatar' => 'mimes:jpg,jpeg,png,gif,bmp | max:2000',
            'category' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => Lang::get('validation.required'),
            'title.min' => Lang::get('validation.min.string'),
            'title.max' => Lang::get('validation.max.string'),
            'description.required' => Lang::get('validation.required'),
            'description.min' => Lang::get('validation.min.string'),
            'author.required' => Lang::get('validation.required'),
            'author.min' => Lang::get('validation.min.string'),
            'author.max' => Lang::get('validation.max.string'),
            'sku.min' => Lang::get('validation.min.string'),
            'avatar.mimes' => Lang::get('validation.mimes'),
            'avatar.max' => Lang::get('validation.max.file'),
        ];
    }
}
