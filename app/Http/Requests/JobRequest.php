<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'specification' => ['required', 'string', 'max:1000'],
            'type_id' => ['required'],
            'city_id' => ['required'],
            'category_id' => ['required'],
            'experience' => ['required', 'numeric', 'digits_between:1,3'],
            'expiry_date' => ['required', 'date', 'date_format:Y-m-d'],
            'openings' => ['required', 'numeric', 'digits_between:1,2'],
            'salary' => ['required'],
            'status' => ['required', 'boolean'],
        ];
    }
    public function attributes()
    {
        return [
            'type_id' => 'job type',
            'city_id' => 'city',
            'category_id' => 'category',
        ];
    }
}
