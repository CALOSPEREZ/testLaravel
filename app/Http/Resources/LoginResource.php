<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
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
            "name" => $this->name,
            "token"=>$this->token,
            "Rol"=>$this->getRoleNames()->first(),
            "permissions"=> PermissionResource::collection($this->getAllPermissions()),
        ];
    }
}
