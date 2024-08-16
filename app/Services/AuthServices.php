<?php

namespace App\Services;

use App\Enums\BlockEnum;
use App\Enums\OtptypeEnum;
use App\Enums\UserTypesEnum;
use App\Http\Requests\Api\CreateAddressRequest;
use App\Http\Resources\Api\AddressResource;
use App\Http\Resources\Api\UserResource;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Traits\GeneralResponse;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Request;
use Carbon\Carbon;
use Ichtrojan\Otp\Otp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthServices
{
    use ImageUploadTrait;
    protected  $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(array $data):JsonResponse
    {
      $user = $this->userRepository->register($data);

      $tokenResult = $this->generateToken($user);
      $otp = SettingService::otpGenerate($user->phone);
      $response= [
        'user'       => new UserResource($user),
        'token'      => $tokenResult->accessToken,
        'token_type' => 'Bearer',
        'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
        'otp'        => $otp->token
      ];
      return GeneralResponse::responseMessage('success',$response,200);
    }

    public function completeRegister(array $data):JsonResponse
    {
      $user = $this->userRepository->completeRegister($data);
      $response = new UserResource($user);
      return GeneralResponse::responseMessage('success',$response,200);
    }

  public function verifiedUser():bool
  {
     $userId = auth('api')->user()->id;
     return $this->userRepository->verifiedUser($userId);
  }



  public function generateToken($user)
  {
    return $user->createToken('footerMobileToken');
  }


  public function sendOtp($phone = "",$dataResponce='json'):array|JsonResponse
  {
    $phone == "" ? $phone = auth('api')->user()->phone : $phone;
    $otp = SettingService::otpGenerate($phone);
//    SmsService::sendSms($phone, $message);
    $data = [
      'status'  => @$otp->status,
      'token'   => @$otp->token,
      'message' => @$otp->message,
    ];
    if($dataResponce == 'json'){
      return GeneralResponse::responseMessage('success',$data,200);
    }else{
      return $data;
    }
  }

  public function verifyOtp(array $data):JsonResponse
  {
    $phone    = auth('api')->user()->phone;
    $response = (new Otp)->validate($phone,$data['otp']);
    if($response->status == true){
      if($data['type'] == OtptypeEnum::Register){
        $this->verifiedUser();
      }
      return GeneralResponse::responseMessage('success',$response->message,200);
    }else {
      return GeneralResponse::responseMessage('error', $response->message, 400);
    }
  }

  public function profile():JsonResponse
  {
    $response = new UserResource(auth('api')->user());

    return GeneralResponse::responseMessage('success',$response,200);
  }
  public function login($request):JsonResponse
  {
    $user = $this->userRepository->findByPhone($request['phone'],UserTypesEnum::User);
    if(!$user){
      return GeneralResponse::responseMessage('error',__('main.AccountDeleted'),400);
    }
    if($user->block == BlockEnum::Blocked){
      return GeneralResponse::responseMessage('error',__('main.AccountBlocked'),400);
    }
    if(!Hash::check($request['password'],$user->password)){
      return GeneralResponse::responseMessage('error',__('main.PasswordNotCorrect'),400);
    }
    $tokenResult = $this->generateToken($user);
    $response= [
      'user'       => new UserResource($user),
      'token'      => $tokenResult->accessToken,
      'token_type' => 'Bearer',
      'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
    ];
    return GeneralResponse::responseMessage('success',$response,200);
  }
  public function softDelete():JsonResponse
  {
     $this->userRepository->delete(auth('api')->user()->id);
     return GeneralResponse::responseMessage('success',__('main.AccountDeleteSuccees'),200);
  }
  public function logout():JsonResponse
  {
    Session::flush();
    $user = auth('api')->logout();
    return GeneralResponse::responseMessage('success',__('main.SuccessLogout'),200);
  }

  public function restPassword($request):JsonResponse
  {
    $user       = $this->userRepository->findByPhone($request['phone'],UserTypesEnum::User);
    if(!$user){
      return GeneralResponse::responseMessage('error',__('main.AccountDeleted'),400);
    }
    $otp        = $this->sendOtp($user->phone,'data');
    $tokenResult = $this->generateToken($user);
    $response= [
      'user'       => new UserResource($user),
      'token'      => $tokenResult->accessToken,
      'token_type' => 'Bearer',
      'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
      'otp'         => $otp['token']
    ];
    return GeneralResponse::responseMessage('success',$response,200);
  }

  public function updatePassword(array $data):JsonResponse
  {
    $user = $this->userRepository->UpdatePassword($data);
    $response = new UserResource($user);
    return GeneralResponse::responseMessage('success',$response,200);
  }
  public function CreateAddress(CreateAddressRequest $request):JsonResponse
  {
    $data = $request->all();
    if($request->hasFile('image')){
      $data['image'] = $this->uploadImage($request->file('image'), $folder = 'address');
    }
    $address = $this->userRepository->CreateAddress($data);

    $response = new AddressResource($address);
    return GeneralResponse::responseMessage('success',$response,200);
  }


}
