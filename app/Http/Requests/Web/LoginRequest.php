<?php

namespace App\Http\Requests\Web;

use App\Traits\FailedValidationWebHandler;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
     use FailedValidationWebHandler;
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
     * @return array<string, mixed>
     */
    public function rules()
    {
      return [
        'email'      => ['required','string','email','exists:users,email'],
        'password'   => ['required', 'string', 'min:8'],
      ];
    }
}
