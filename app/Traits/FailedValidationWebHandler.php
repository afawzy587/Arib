<?php

namespace App\Traits;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
trait FailedValidationWebHandler
{
  public function failedValidation(Validator $validator)
  {
      toastr()->error($validator->errors()->first());
  }
}
