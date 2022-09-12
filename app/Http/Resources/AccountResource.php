<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return 
        [
            'name'=> $this->name, 
            'display_name'=> $this->display_name,
            'avatar'=> $this->avatar,
            'email'=> $this->email,
            'address'=> $this->address,
            'phone_number'=> $this->phone_number,
            'status_date'=> $this->status_date,
            'status' => $this->status,
            'fb_url'=> $this->fb_url,
            'languages' => $this->languages,
            'national'=> $this->national,
        ];
    }
}
