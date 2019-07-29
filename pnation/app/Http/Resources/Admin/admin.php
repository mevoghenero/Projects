<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class Admin extends JsonResource
{
    /**
     * Transform the resource into an array.
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
            
        ];
    }

    public function with($request)
    {
        return ApiDetails();
    }
}
