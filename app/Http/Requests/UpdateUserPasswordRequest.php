<?php

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use App\Rules\CurrentPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Rules\Password;

class UpdateUserPasswordRequest extends FormRequest
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
            'current_password' => ['required', 'string', new CurrentPassword],
            'password' => ['required', 'string', new Password, 'confirmed'],
        ];
    }
}
