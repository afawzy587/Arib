<?php

namespace App\Traits;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
trait FailedValidationResponseHandler
{
  public function failedValidation(Validator $validator)
  {
    throw new HttpResponseException(
      GeneralResponse::responseMessage(
        __('fail'),
        $validator->errors()->first(),
        422, NULL,
        $this->transformErrors($validator->errors()->toArray())
      )
    );
  }

  private function transformErrors(array $errs): array
  {
      $errors = array();

      foreach ($errs as $field => $messages) {
        foreach ($messages as $message) {
          $errors[] = $message;
        }
      }

      return $errors;
  }
}
