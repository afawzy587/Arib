<?php

namespace App\Services;


use Carbon\Carbon;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\JsonResponse;
class SettingService
{
  public function __construct()
  {

  }
  public static function getClientIp()
  {
    $ip = request()->getClientIp();
    if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $xffaddrs = explode(',',$_SERVER['HTTP_X_FORWARDED_FOR']);
      $_SERVER['REMOTE_ADDR'] = $xffaddrs[0];
      $ip = $xffaddrs[0];
    }

    return $ip;
  }

  public static function otpGenerate(string $phone)
  {
    $otpString = (new Otp)->generate($phone, 'numeric', 6, 15);
    return $otpString;
  }

  public static function getVat()
  {
    return .15;
  }

  public static function getVatFormatted()
  {
    return (self::getVat() * 100) . '%';
  }

  public static function extractVat($price, $vat): float
  {
    return round($price - $price / (1 + $vat), 2);
  }

  public static function getPackageCommission()
  {
    return .20;
  }

  public static function getPackageCommissionFormatted()
  {
    return (self::getPackageCommission() * 100) . '%';
  }

  // To map Carbon day number with database day id
  public const DAYS = [
    Carbon::SATURDAY => 1,
    Carbon::SUNDAY => 2,
    Carbon::MONDAY => 3,
    Carbon::TUESDAY => 4,
    Carbon::WEDNESDAY => 5,
    Carbon::THURSDAY => 6,
    Carbon::FRIDAY => 7,
  ];
}
