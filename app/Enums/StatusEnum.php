<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

final class StatusEnum extends Enum
{
  const ToDO           = 1;
  const InProgress   = 2;
  const Done         = 3;
  static function getStatus():array
  {
    return [
      StatusEnum::ToDO => __('lang.ToDO'),
      StatusEnum::InProgress => __('lang.InProgress'),
      StatusEnum::Done => __('lang.Done'),
    ];
  }
  static function getValues():array
  {
    return [
      StatusEnum::ToDO,
      StatusEnum::InProgress,
      StatusEnum::Done,
    ];
  }
}
