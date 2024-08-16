<?php

namespace App\Http\Requests\Api;

use App\Traits\FailedValidationResponseHandler;
use Illuminate\Foundation\Http\FormRequest;

class CreateAddressRequest extends FormRequest
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
          'city_id'      =>['required','integer','exists:cities,id'],
          'street'       =>['required','string','min:3'],
          'street_num'   =>['nullable','string','min:1'],
          'build_num'    =>['required','string','min:1'],
          'house_num'    =>['nullable','string','min:1'],
          'lat'          =>['required','string'],
          'long'         =>['required','string'],
          'description'  =>['nullable','string','min:1'],
          'image'        =>['nullable','file','mimes:jpeg,png,jpg,gif|max:2048'],
        ];
    }
}
