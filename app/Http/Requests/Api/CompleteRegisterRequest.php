<?php

namespace App\Http\Requests\Api;

use App\Traits\FailedValidationResponseHandler;
use Illuminate\Foundation\Http\FormRequest;

class CompleteRegisterRequest extends FormRequest
{
  use FailedValidationResponseHandler;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {

      return [
        'name'     => ['required','string','unique:users,name'],
        'password' => ['required', 'string', 'confirmed', 'min:8', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
      ];
    }

    public function messages()
    {
      return [
        'password.regex' => __('main.passwordRegex')
      ];
    }
}
