<?php

namespace App\Http\Resources\Student;

use App\Http\Resources\Subject\Subject;
use Illuminate\Http\Resources\Json\JsonResource;

class Student extends JsonResource
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
            'password'  => $this->password,
            // 'subject'   => new Subject($this->subject),
            'student'   => $this->student,
            
        ];
    }

    public function with($request)
    {
        return ApiDetails();
    }
}
