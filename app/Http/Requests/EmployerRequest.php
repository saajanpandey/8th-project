<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumberValidation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class EmployerRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'numeric', new PhoneNumberValidation],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols(), 'confirmed'],
            'pan_number' => ['required', 'numeric', 'digits_between:1,20'],
            'website' => ['required', 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'],
            'location' => ['required', 'string', 'max:255'],
            'city_id' => 'required',
            'status' => 'required',
            'description' => ['string', 'max:255'],
        ];
    }
    public function attributes()
    {
        return [
            'city_id' => 'city',
        ];
    }
}
