<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'content' => 'min:5',
        ];
    }

    public function messages()
    {
        return [
            'title.min' => __('page.reviews.title'),
            'content' => __('page.reviews.content'),
        ];
    }
}
