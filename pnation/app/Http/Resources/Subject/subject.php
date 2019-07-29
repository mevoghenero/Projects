<?php

namespace App\Http\Resources\Subject;

use Illuminate\Http\Resources\Json\JsonResource;

class Subject extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'cat_id' => $this->cat_id
        ];
    }

    public function with($request)
    {
        return ApiDetails();

    }
    
}
