<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
        'id'              => $this->id,
        'city'            => $this->city_id,
        'street'          => $this->street,
        'street_num'      => $this->street_num,
        'build_num'       => $this->build_num,
        'house_num'       => $this->house_num,
        'lat'             => $this->lat,
        'long'            => $this->long,
        'description'     => $this->description,
        'image'     => $this->image ? asset($this->image) :null,
      ];
    }
}
