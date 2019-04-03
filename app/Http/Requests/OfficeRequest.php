<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lang;

class OfficeRequest extends FormRequest
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
            'name' => 'required|min:3',
            'address' => 'required|min:3',
            'wsm_workspace_id' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.min' => Lang::get('validation.min.string'),
            'address.min' => Lang::get('validation.min.string'),
        ];
    }
}
