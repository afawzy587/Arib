<?php

namespace App\Util;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Translation\Translator;

class TranslateUtil
{

  static function translate(string $key = null, $replace = [], $locale = null): array|string|Translator|Application|null
  {
    $replace = $replace ?? [];
    return __($key , $replace , $locale);
  }
}
