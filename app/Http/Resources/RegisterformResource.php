<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegisterformResource extends JsonResource
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
            'receive_vaccine_dose' => $this->receive_vaccine_dose,
            'first_vaccine_type' => $this->first_vaccine_type,
            'interested_vaccine' => $this->interested_vaccine,
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'dof' => $this->dof,
            'age' => $this->age,
            'address_line_1' => $this->address_line_1,
            'city' => $this->city,
            'state' => $this->state,
            'zipcode' => $this->zipcode,
            'phone' => $this->phone,
            'email' => $this->email,
            'sex' => $this->sex,
            'vaccine_location' => $this->vaccine_location,
            'vaccine_date' => $this->vaccine_date,
            'status' => $this->status,
            'pregnant' => $this->pregnant,
            'month' => $this->month,
            'day' => $this->day,
            'reference_id' => $this->reference_id

        ];
    }
}
