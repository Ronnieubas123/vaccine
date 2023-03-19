<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRegisterformRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'receive_vaccine_dose' => 'required|string',
            'first_vaccine_type' => 'int',
            'interested_vaccine' => 'string',
            'firstname' => 'required|string',
            'middlename' => 'required|string',
            'lastname' => 'required|string',
            'dof' => 'required|string',
            'age' => 'required|string',
            'address_line_1' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'required|int',
            'phone' => 'required|int',
            'email' => 'required|string',
            'sex' => 'required|string',
            'vaccine_location' => 'required|string',
            'vaccine_date' => 'required',
            'status' => 'required|string',
            'pregnant' => 'required|string',
            'month' => 'required|string',
            'days' => 'required|string',
            'reference_id' => 'required|string',
            'dose' => 'required'
            
        ]; 
    }
}
