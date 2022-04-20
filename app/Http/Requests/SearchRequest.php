<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'experience' => ['required'],
            'category_id' => ['required'],
            'city_id' => ['required'],
            'type_id' => ['required'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Job Title'
        ];
    }
    public function messages()
    {
        return [
            'experience.required' => 'Experience is required.',
            'category_id.required' => 'Please select a category.',
            'city_id.required' => 'Please select a city.',
            'type_id.required' => 'Please select a job type.',
        ];
    }
}
