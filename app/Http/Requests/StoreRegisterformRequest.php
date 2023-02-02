<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterformRequest extends FormRequest
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
            'first_vaccine_type' => 'exists|id',
            'interested_vaccine' => 'exists|id',
            'firstname' => 'required|string',
            'middlename' => 'required|string',
            'lastname' => 'required|string',
            'dof' => 'required|string',
            'age' => 'required|string',
            'address_line_1' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'sex' => 'required|string',
            'vaccine_location' => 'required|string',
            'vaccine_date' => 'required|string',
            
        ]; 
    }
}
