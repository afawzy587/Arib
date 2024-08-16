<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
      return [
        'id'          => $this->id,
        'name'        => $this->name,
        'email'       => $this->email,
        'phone'       => $this->phone,
        'country'     => new CountryResource($this->country),
        'avatar'      => $this->avatar ? asset($this->avatar):null,
        'verified'    => $this->email_verified == null ? 0 : 1,
        'is_block'    => $this->block
      ];
    }
}
