<?php

namespace App\Http\Requests\Api;

use App\Enums\OtptypeEnum;
use App\Traits\FailedValidationResponseHandler;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class OtpRequest extends FormRequest
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
        'otp' => ['required','string','min:6'],
        'type' => ['required','string',Rule::in([OtptypeEnum::Register,OtptypeEnum::RestPassword])],
      ];
    }
}
