<?php

namespace App\Http\Requests\Api;

use App\Rules\Phone;
use App\Rules\PhoneZero;
use App\Traits\FailedValidationResponseHandler;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        'country_id' => ['required','integer','exists:countries,id'],
        'phone'      => ['required','string',new Phone($this->country_id), 'unique:users,phone'],
      ];
    }
}
