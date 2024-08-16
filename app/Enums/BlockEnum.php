<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

final class BlockEnum extends Enum
{
  const Blocked      = 1;
  const Open         = 0;
  static function getTypes()
  {
    return [
      1 => __('main.blocked'),
      0 => __('main.open'),
    ];
  }
}
