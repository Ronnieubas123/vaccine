<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVaccineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // check if the user that update the data is the user that added it
        // $vaccine = $this->route('vaccine');
        // if ($this->user()->id !==  $vaccine->user_id) {
            
        // }
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
            'name' => 'nullable|string',
            'dosage' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'string|nullable'
        ];
    }
}
