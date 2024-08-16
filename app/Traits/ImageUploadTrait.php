<?php

namespace App\Traits;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ImageUploadTrait
{

  public function uploadImage($uploadedFile, $folder = 'global'):string
  {
     $imageName = time().'.'.$uploadedFile->extension();
     $path = 'uploads/'.$folder;
     $uploadedFile->move(public_path($path), $imageName);
     return $path.'/'.$imageName;
  }

}
