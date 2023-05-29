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
            'citizen_id' => $this->citizen_id,
            'vaccine_location' => $this->vaccine_location,
            'vaccine_date' => $this->vaccine_date,
            'status' => $this->status,
            'pregnant' => $this->pregnant,
            'month' => $this->month,
            'day' => $this->day,
            'reference_id' => $this->reference_id,
            'dose' => $this->dose,
            'user_id' => $this->user_id

        ];
    }
}
