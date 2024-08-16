<?php

namespace App\Http\Requests\Api;

use App\Traits\FailedValidationResponseHandler;
use Illuminate\Foundation\Http\FormRequest;

class RestPasswordRequest extends FormRequest
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
    public function rules()
    {
      return [
        'phone'  => ['required','string','exists:users,phone'],
      ];
    }
}
