<?php
return [
  'access_key' => env('access_key', 'ftWxF10FfO3dOoYljmGV'),
  'otp_size' => env('otp_size', 6),
  'otp_expire_after_minutes' => env('otp_expire_after_minutes', 2),
  'otp_per_hour' => env('otp_per_hour', 10),
  'test_numbers_otp' => 123456,
  'package_user_id' => 1,
  'low_rate_to_send_sms' => 4,
  'max_quantity' => 1000,
  'paginate' => 20,
];
