<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

final class OtptypeEnum extends Enum
{
  const Register      = 1;
  const RestPassword         = 2;
}
