<?php

namespace App\Rules;

use App\Models\Country;
use Illuminate\Contracts\Validation\Rule;
use libphonenumber\PhoneNumberUtil;

class Phone implements Rule
{
  protected $country;

  public function __construct($country=0)
  {
    $this->country = $country;
  }

  public function passes($attribute, $value)
  {

      $phoneUtil = PhoneNumberUtil::getInstance();
      $country = Country::find($this->country);
      if(!$country){
        return false;
      }
      try {
        $phoneNumber = $phoneUtil->parse($value,$country->code);
        return $phoneUtil->isValidNumber($phoneNumber);
      } catch (\libphonenumber\NumberParseException $e) {
        return false;
      }
  }

  public function message()
  {
    return __('main.The phone number is not valid for the selected country');
  }
}
