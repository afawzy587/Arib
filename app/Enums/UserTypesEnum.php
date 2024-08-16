<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

final class UserTypesEnum extends Enum
{
  const Employee      = 1;
  const Manger       = 2;
  static function getTypes()
  {
    return [
      UserTypesEnum::Employee => __('main.Employee'),
      UserTypesEnum::Manger => __('main.Manger'),
    ];
  }

  static function getValues()
  {
    return [
      UserTypesEnum::Employee,
      UserTypesEnum::Manger,
    ];
  }
}
