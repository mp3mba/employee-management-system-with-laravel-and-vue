<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'id' => $this->id,
            'firstname' => $this->firstname,
            'middletname' => $this->middletname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'country' => $this->country,
            'state' => $this->state,
            'city' => $this->city,
            'department' => $this->department,
            'zip_code' => $this->zip_code,
            'birth_date' => $this->birth_date,
            'hire_date' => $this->hire_date,
        ];
    }
}
