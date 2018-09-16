<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'title' => 'min:5|max:191',
            'description' => 'min:20',
            'author' => 'min:5|max:191',
            'sku' => 'min:5',
            'avatar' => 'mimes:jpg,jpeg,png,gif,bmp',
        ];
    }
    public function messages()
    {
        return [
            'title.min' => __('admin.errTitleBook'),
            'title.max' => __('admin.errTitleBook'),
            'description.min' => __('admin.errDescriptionBook'),
            'author.min' => __('admin.errAuthor'),
            'author.max' => __('admin.errAuthor'),
            'sku.min' => __('admin.errSku'),
            'avatar.mimes' => __('admin.errImg'),
        ];
    }
}
