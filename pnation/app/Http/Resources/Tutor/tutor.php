<?php

namespace App\Http\Resources\Tutor;

use App\Http\Resources\ApiDetails;
use Illuminate\Http\Resources\Json\JsonResource;

class Tutor extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
            'id'        => $this->id,
            'first_name'=> $this->first_name,
            'last_name' => $this->last_name,
            'role'      => $this->role,
            'email'     => $this->email,
            'phone'     => $this->phone,
            'address'   => $this->address,
            'city'      => $this->city,
            'state'     => $this->state,
            'password'  => $this->password,
            'tutor'     => $this->tutor,
            
        ];
    }

    public function with($request)
    {
        return ApiDetails();
    }
    
}
