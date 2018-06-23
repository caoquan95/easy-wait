<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Queue extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "status" => $this->status,
            "created_at" => strtotime($this->created_at),
            "updated_at" => strtotime($this->updated_at)
        ];  
    }
}