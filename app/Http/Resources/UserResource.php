<?php

namespace App\Http\Resources;
 
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class UserResource extends JsonResource
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
            "email" => $this->email,
            "created_at"=> Carbon::parse($this->created_at)->format('d/m/Y H:i:s')
        ];
    }
}
