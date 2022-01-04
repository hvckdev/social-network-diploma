<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileInformationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'middle_name' => 'max:255',
            'last_name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'website' => 'max:255'
        ];
    }
}